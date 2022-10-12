<!DOCTYPE html>

<html>

<head>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

</head>

    

<body>

<div class="container">

     

    <div class="panel panel-primary">

      <div class="panel-heading"><h2>PLease Upload Your Image Here</h2></div>

      <div class="panel-body">

     

        @if ($message = Session::get('success'))

        <div class="alert alert-success alert-block">

            <button type="button" class="close" data-dismiss="alert">×</button>

                <strong>{{ $message }}</strong>

        </div>

        <img src="images/{{ Session::get('file_name') }}">

        @endif

    

        <form action="{{ route('image.upload.post') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="row">

    

                <div class="col-md-6">

                    <input type="file" name="file_name" class="form-control">

                </div>

     

                <div class="col-md-6">

                    <button type="submit" class="btn btn-success">Upload</button>

                </div>

     

            </div>

        </form>

    

      </div>

    </div>

</div>

</body>

  

</html>