@extends('userDetails.layout')

  

@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2> Show Customer</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('userDetails.index') }}"> Back</a>

            </div>

        </div>

    </div>

   

    <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>First Name:</strong>

                    <input type="text" name="customer_name" disabled value="{{ $user->customer_name }}" class="form-control" placeholder="First Name">

                </div>

            </div>

           

          
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Mobile Number:</strong>

                    <input type="text" name="customer_mobile"  disabled value="{{ $user->customer_mobile }}" class="form-control" placeholder="Last Name">

                </div>

            </div>
    </div>

@endsection
