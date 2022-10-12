@extends('userDetails.layout')

 

@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>EAGLES DARE</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-success" href="{{ route('userDetails.create') }}"> Create New Customer</a>

            </div>

        </div>

    </div>

   

    @if ($message = Session::get('success'))

        <div class="alert alert-success">

            <p>{{ $message }}</p>

        </div>

    @endif

   

    <table class="table table-bordered">

        <tr>

            <th>No</th>

            <th>Customer Name</th>

            <th>Customer Mobile</th>


            <th width="280px">Action</th>

        </tr>
           
        @foreach ($userDetails as $user)


        <tr>

            <td>{{ ++$i }}</td>

            <td>{{ $user->customer_name }}</td>

            <td>{{ $user->customer_mobile }}</td>



            <td>

                <form action="{{ route('userDetails.destroy',$user->id) }}" method="POST">

   

                    <a class="btn btn-info" href="{{ route('userDetails.show',$user->id) }}">Show</a>

    

                    <a class="btn btn-primary" href="{{ route('userDetails.edit',$user->id) }}">Edit</a>

   

                    @csrf

                    @method('DELETE')

      

                    <button type="submit" class="btn btn-danger">Delete</button>

                </form>

            </td>

        </tr>

        @endforeach

    </table>

  

    {!! $userDetails->links() !!}

      

@endsection