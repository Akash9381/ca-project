<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="{{asset('login/dashboard/demo.css')}}" rel="stylesheet" />
    <link href="{{asset('login/css/bootstrap.min.css')}}" rel="stylesheet" />
    <style>
        *{
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
    </style>
</head>
<body>
    <header class="text-center">
        <img src="{{asset('login/img/tall img.jpg')}}" alt="logo"><h1>TAX MALL</h1>
    </header>
    <fieldset>
    <form class=" text-center shadow rounded mt-5" >
       <h2> Enter Your Registered Mobile Number</h2>
        <div class="m-3 text-center">
          <input type="email" class="justify-content-center w-100" placeholder="Mobile Number" class="form-control" id="InputEmail1" aria-describedby="emailHelp">

        </div>
        <div class="m-3 text-center fs-3">
            <input type="text" class="justify-content-center w-100" placeholder="Enter OTP" class="form-control" id="InputEmail1" aria-describedby="emailHelp">
        </div>

    <div class="m-3" class="fbut">
        <button type="button" class="btn btn-success w-100 ">GET OTP</button>
    </div>

        <div class="m-3" class="fbut">
            <a href="dashboard.html">
        <button type="button" class="btn btn-success w-100"> LOG IN</button></a>
    </div>
    </fieldset>
      </form>
</body>
</html>
