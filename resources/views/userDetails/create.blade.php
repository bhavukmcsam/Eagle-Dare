@extends('userDetails.layout')

  

@section('content')

<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>Add New Customer</h2>

        </div>

        <div class="pull-right">

            <a class="btn btn-primary" href="{{ route('userDetails.index') }}"> Back</a>

        </div>

    </div>

</div>

   

@if ($errors->any())

    <div class="alert alert-danger">

        <strong>Whoops!</strong> There were some problems with your input.<br><br>

        <ul>

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif

   

<form action="{{ route('create.customer') }}" method="POST">

    @csrf

  

     <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Customer Name:</strong>

                <input type="text" name="customer_name" class="form-control" placeholder="Customer Name">

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

            <strong>Customer Mobile:</strong>

            <input type="text" name="customer_mobile" class="form-control" placeholder="Customer Mobile">

            </div>

        </div>



        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </div>

   

</form>

@endsection