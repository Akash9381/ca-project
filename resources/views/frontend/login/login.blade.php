<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="{{asset('login/dashboard/demo.css')}}" rel="stylesheet" />
    <link href="{{asset('login/css/bootstrap.min.css')}}" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        *{
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
                    /* Chrome, Safari, Edge, Opera */
            input::-webkit-outer-spin-button,
            input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
            }

            /* Firefox */
            input[type=number] {
            -moz-appearance: textfield;
            }
            .error{
                color: red;
            }
    </style>
</head>
<body>
    <header class="text-center">
        <a href="{{route('home')}}"><img src="{{asset('login/img/tall img.jpg')}}" alt="logo"><h1 style="color: #212529">TAX MALL</h1></a>
    </header>
    <fieldset>
    <form id="otpform" class="text-center shadow rounded mt-5" action="{{url('otpverify')}}" method="POST">
        @csrf
        <h2> Enter Your Registered Mobile Number</h2>
        @if(session()->has('otperror'))
        <div class="alert alert-danger">
        {{ session()->get('otperror') }}
        </div>
        @endif
        <p class="alert alert-danger anauthorized" style="display: none">Unauthorized Person! Please contact to admin.</p>
        <p class="alert alert-success success" style="display: none">Please Input Your OTP</p>
        <p class="alert alert-danger error" style="display: none">Enter Valid Number!</p>
            <div class="m-3 text-center">
            <input type="number" class="justify-content-center w-100" value="{{old('number')}}" placeholder="Mobile Number" class="form-control" id="number" name="number">
            @error('number')
            <label id="number-error" class="error" for="number">{{$message}}</label>
            @enderror
            </div>
            <div class="m-3 text-center fs-3">
                <input type="number" class="justify-content-center w-100" name="otp" minlength='4'
                maxlength='4' placeholder="Enter OTP" class="form-control" >
                @error('otp')
                <label id="otp-error" class="error" for="otp">{{$message}}</label>
                @enderror
            </div>

        <div class="m-3" class="fbut">
            <a type="button" id="optgenerate"  class="btn btn-success w-100" style="color: white">GET OTP</a>
        </div>
        <div class="m-3" class="fbut">
            <a href="dashboard.html">
        <button type="submit" class="btn btn-success w-100">LOG IN</button></a>
        </div>
    </form>
    </fieldset>

    <script>
        $(document).ready(function(){
            $("#otpform").validate({
                rules:{
                    number:{
                        required:true,
                        minlength:10,
                        maxlength:10
                    },
                    otp:{
                        required:true,
                        minlength:4,
                        maxlength:4
                    }
                }
            })

            $("#optgenerate").click(function(){
                let number = $("#number").val();
                $.ajax({
                    url:'/otp-generate/',
                    method:'POST',
                    data:{number:number,_token:"{{ csrf_token() }}"},
                    success:function(res){
                        if(res.success == true){
                            $(".anauthorized").hide();
                            $(".success").show();
                            $(".error").hide();
                        }else if(res.error){
                            $(".anauthorized").hide();
                            $(".success").hide();
                            $(".error").show();
                        }else{
                            $(".anauthorized").show();
                            $(".success").hide();
                            $(".error").hide();
                        }
                    }
            })
            })
        });
    </script>
</body>
</html>
