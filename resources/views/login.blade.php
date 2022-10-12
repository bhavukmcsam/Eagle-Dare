<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Rubik:400,700'>
  <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">

</head>
<body>
  <form method="post" action="{{ route('login') }}">
      @csrf

      <div class="container">
      <h1>Enter your Details to Login </h1>

        <label for="name"><b>Username</b></label><br>
        <input type="text" placeholder="Enter Username" name="email" required><br> 

        <label for="password"><b>Password</b></label><br>
        <input type="password" placeholder="Enter Password" name="password" required>

        <button type="submit">Login</button>
   
      </div>

    </form>



</body>
</html>

