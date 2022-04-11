{{-- <html>
    <head>
        <title>Form Login</title>
    </head>

    <body>
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-primary">Login</h3> 
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                <div class="button-list">
                    <div class="card-body">
                        <form method="post" action="{{ route('login') }}" >
                            @csrf
                            <title>Đăng Nhập</title>
                            <label>Email: </label><input name="email" ><br>
                            <p style="color:red">@if ($errors->has('email')) {{ $errors->first('email') }}<br>@endif</p>
                            <label>Password: </label><input name="password" ><br>
                            <p style="color:red">@if ($errors->has('password')) {{ $errors->first('password') }}<br>@endif</p>
                            <label>Remember: <input type="checkbox" name="remember" ><br> </label>
                            <input type="submit">
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </body>

</html> --}}


<!DOCTYPE html>
<html lang="en">

<head>
    <link href="{{ url('css/style.css') }}" rel="stylesheet">
</head>

<body>

    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->
            <h2 class="active"> Sign In </h2>

            <!-- Icon -->
            <div class="fadeIn first">
                <img src=../images/logo.png alt="homepage" class="dark-logo" height="80" width="150" />
            </div>

            <!-- Login Form -->
            <form method="post" action="{{ route('login') }}" enctype="multipart/form-data">
                @csrf
                <input type="text" id="login" class="fadeIn second" name="email" placeholder="Email"><br><br>
                <input type="text" id="password" class="fadeIn third" name="password" placeholder="Password">
                <p style="color:red">@if ($errors->has('email')) <?php echo "Không hợp lệ";?><br>@endif</p>
                <input type="submit" class="fadeIn fourth" value="Log In">
            </form>

        </div>
    </div>
</body>

</html>
