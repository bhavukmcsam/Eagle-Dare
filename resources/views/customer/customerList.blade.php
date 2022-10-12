
@extends('userDetails.layout')

 

@section('content')

        <div class="row">

                <div class="col-lg-12 margin-tb">

                    <div class="pull-left">

                        <h2>Customer List</h2>

                    </div>
                </div>
        </div>
            
    <table class="table table-bordered">
        <tr>
            <th>Sr.No</th>
            <th>Customer Name</th>
            <th>Mobile Number</th>
            <th>No. of images</th>
            <th>No. of Videos</th>
            <th>Download Status(Downloaded/Pending)</th>
            <th width="280px">Action</th>

        </tr>
        @foreach ($getData as $data)

        <tr>
            <td>{{$data->id}}</td>
            <td>{{$data->customer_name}}</td>
            <td>{{$data->customer_mobile}}</td>
            <td>{{$data->imageCount}}</td>
            <td>{{$data->videoCount}}</td>
            <td>{{$data->download}}</td>
            <td>

                <form action="{{route('delete-images',$data->id)}}" method="POST">

                    <a class="btn btn-info" href="{{ route('show-images',$data->id) }}">Show</a>

                    
                    <a class="btn btn-primary" href="{{ route('get-link',$data->id) }}">Link</a>



                    @csrf

                    @method('DELETE')



                    <button type="submit" class="btn btn-danger">Delete</button>

                </form>

        </td>
        </tr>
    
 
        @endforeach

</table>
    @endsection
    