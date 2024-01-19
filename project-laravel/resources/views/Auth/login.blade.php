<!DOCTYPE html>
<!-- Website - www.codingnepalweb.com -->
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <title>Login Form</title>
    <link rel="stylesheet" href="css/style-login.css" />
</head>

<body>
    <div class="center">
        <h1>Login User</h1>

        <form action="{{ url('/loginPost') }}" method="post">
            {{ csrf_field() }}
            <div class="txt_field">
                <input type="text" name="username" id="username" required />
                <span></span>
                <label>Masukkan Username</label>
            </div>
            <div class="txt_field">
                <input type="password" name="password" id="password" required />
                <span></span>
                <label>Masukkan Password</label>
            </div>
            @if(\Session::has('alert-success'))
            <script>
                alert("{{Session::get('alert-success')}}");
            </script>
            @endif
            @if(\Session::has('alert-failed'))
            <div class="alert alert-danger">
                <p style="color:red; font-style:italic">{{Session::get('alert-failed')}}</p>
            </div>
            @endif
            <div class="signup_link" style="text-align: start;"><a href="">Forgot Password ?</a></div>
            <button type="submit" name="login">Login</button>
            <div class="signup_link">Don't have an account ? <a href="/registrasiPembeli">Signup</a></div>
            <div class="signup_link">Want to register your shop ? <a href="/registrasiPenjual">Signup</a></div>
        </form>
    </div>
</body>

</html>
