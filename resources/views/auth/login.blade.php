<!DOCTYPE html>
<html lang="en">

<head>
    @include('auth.css')
    <title>Login</title>
</head>

<body>
    <div class="main">
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="/login_page/images/signin-image.jpg" alt="sign up image"></figure>
                        <a href="{{ route('register') }}" class="signup-image-link">buat akun</a>
                    </div>
                    <div class="signin-form">
                        <h2 class="form-title">Login</h2>
                        <form method="POST" action="{{ route('login') }}" class="register-form" id="login-form">
                            @csrf
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" :value="old('email')" required autofocus autocomplete="username" />
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password" required autocomplete="current-password" />
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <a href="{{ route('password.request') }}" class="signup-image-link agree-term">lupa password</a>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="login" id="login" class="form-submit" value="Login" />
                            </div>
                        </form>
                        <div class="social-login">
                            <span class="social-label">Atau login dengan</span>
                            <ul class="socials">
                                <li><a href="{{route('auth.redirect')}}"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @include('auth.js')
</body>

</html>