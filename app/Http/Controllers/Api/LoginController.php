<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Customer;
use App\Models\CustomerDetail;
use App\Models\ImageUpload;
use Hash;
use DB;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function loginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        
        $credentials = $request->except(['_token']);

        $user = User::where('email',$request->email)->first();
        
        if($user->role == 1)
        {     
            $userDetails = Customer::latest()->paginate(5);
            return view('userDetails.index',compact('userDetails'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        }
        else
        {
            
            $getData=DB::table('image_uploads')->select('customers.id','customers.customer_name','customers.customer_mobile',
            'image_uploads.file_name','image_uploads.file_name',
            'image_uploads.download',DB::raw("count(image_uploads.file_name) as imageCount"),
            DB::raw("count(image_uploads.file_name ) as videoCount"))
            ->join('customers','customers.id','=','image_uploads.customer_id')
            ->groupBy('customers.customer_mobile')
            ->get();
            
            return view('customer.customerList',compact('getData'));
        }
        
    }
   
    
    public function postRegisterData(Request $request)
    {   
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
 
        $user = User::create([
            'name' => trim($request->input('name')),
            'email' => strtolower($request->input('email')),
            'password' => bcrypt($request->input('password')),
        ]);

        session()->flash('message', 'Your account is created');
       
        return redirect()->route('login');
    }

    public function logout()
    {
        \Auth::logout();

        return redirect()->route('login');
    }


    public function index()

    {
        
        $userDetails = Customer::latest()->paginate(5);
        return view('userDetails.index',compact('userDetails'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    public function create()

    {
        return view('userDetails.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required',
            'customer_mobile' => 'required'
        ]);
 
        $user = Customer::create([
            'customer_name' => $request->input('customer_name'),
            'customer_mobile' => $request->input('customer_mobile'),            
        ]);

        $createCustomer= [
            "status" => "200",
            "message" => "Customer Created successfully",
            "data" => $user
        ];
      
        return response()->json($createCustomer);
       
    }
    

    public function show($id)

    {
        $user = Customer::find($id);
        return view('userDetails.show',compact('user'));

    } 

     
    public function edit($id)

    {
        $user = Customer::find($id);
        return view('userDetails.edit',compact('user'));

    }

    
    public function update(Request $request, $id)

    {
        $request->validate([
            'customer_name' => 'required',
            'customer_mobile' => 'required'
        ]);

        $user = Customer::find($id);
        $user->customer_name =  $request->get('customer_name');
        $user->customer_mobile =  $request->get('customer_mobile');
        $user->save();

        return redirect()->route('userDetails.index')

                        ->with('success','Customer updated successfully');

    }

    public function destroy($id)
    {
        $user = Customer::find($id);
        $user->delete();

        return redirect()->route('userDetails.index')

                        ->with('success','Customer deleted successfully');

    }

    public function imageUpload()

    {

        return view('customer.imageUpload');

    }

    public function imageUploadPost(Request $request)

    {

        $request->validate([

            'file_name' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        $images = new ImageUpload($request->input()) ;
        $imageName = time().'.'.$request->file_name->extension();  
        $request->file_name->move(public_path('images'), $imageName);
        $images->file_name = $imageName;
        $images->save();
        $uploadImage = [
            "status" => "Success",
            "message" => "Image Uploaded Successfully",
            "data" => $images
        ];
      
        return response()->json($uploadImage,200);
    }

    public function showImages($id)

    {
        $images=DB::table('image_uploads')->select('customers.customer_mobile as mobile','image_uploads.updated_at','image_uploads.file_name')
            ->join('customers','customers.id','=','image_uploads.customer_id')
            ->where('image_uploads.customer_id',$id)
            ->first();
        
        $getDetails=[
            "file_path" => $images->file_name=asset("images/$images->file_name"),
        ];
            $getImages = [
                "status" => "Success",
                "message" => "List of Images",
                "data" => $getDetails
            ];
            return response()->json($getImages,200);


    } 

    public function destroyImage($id)

    {
    
        $images = ImageUpload::find($id);
        $images->delete();

        return redirect()->route('customer.customerList')

                        ->with('success','Image deleted successfully');

    } 

    public function getLink($id)
    {
        return view('customer.getLink');
    }


}
 