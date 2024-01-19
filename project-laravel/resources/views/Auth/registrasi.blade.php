<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Registration Form </title>
    <link rel="stylesheet" href="css/style-reg.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
    <div class="container">
        <div class="title">Registration</div>
        <div class="content">
            <form action="{{ url('/registrasiPostPembeli') }}" method="post">
                {{ csrf_field() }}
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Full Name</span>
                        <input type="text" placeholder="Enter your name" name="fullname" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Username</span>
                        <input type="text" placeholder="Enter your username" name="username" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Phone Number</span>
                        <input type="text" placeholder="Enter your number" name="nomortelepon" minlength="10" maxlength="13" required>
                    </div>
                    <div class="input-box">
                    </div>
                    <div class="input-box">
                        <span class="details">Password</span>
                        <input type="password" placeholder="Enter your password" name="password" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Confirm Password</span>
                        <input type="password" placeholder="Confirm your password" name="confirmation" required>
                    </div>

                </div>
                @if ($errors->any())
                <div class="alert alert-danger">

                    @foreach ($errors->all() as $error)
                    <p style="color:red; font-style:italic">{{ $error }}</p>
                    @endforeach

                </div>
                @endif
                <div class="gender-details">
                    <div class="button">
                        <input type="submit" value="Register" name="registrasi">
                    </div>
            </form>
            <label for="dot-2">
                <p align="center">Sudah punya akun ? <a href="/login">Login</a></p>
            </label>
        </div>
    </div>

</body>

</html>
