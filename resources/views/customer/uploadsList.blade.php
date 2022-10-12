@extends('userDetails.layout')

  

@section('content')

   

   

    <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Client Name:</strong>

                    <input type="text" name="first_name" value="" class="form-control" placeholder="First Name">

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Mobile Number:</strong>

                    <input type="text" name="mobile_number" value="{{ $list->mobile_number }}" class="form-control" placeholder="Last Name">

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Image Path:</strong>

                    <input type="text" name="image_path" value="{{ $list->image_path }}" class="form-control" placeholder="Last Name">

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Last Visited:</strong>

                    <input type="text" name="updated_at" value="{{ $list->updated_at }}" class="form-control" placeholder="Last Visited">

                </div>

            </div>
    </div>

@endsection