<!DOCTYPE html>
<html lang="en">

<head>
    @include('auth.css')
    <title>Register</title>
</head>

<body>
    <div class="main">
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Register</h2>
                        <form method="POST" action="{{ route('register') }}" class="register-form" id="register-form">
                            @csrf
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name" :value="old('name')" required autofocus autocomplete="name" />
                                @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" :value="old('email')" required autocomplete="username" />
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password" required autocomplete="new-password" />
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Konfirmasi password" required autocomplete="new-password" />
                                @if ($errors->has('password_confirmation'))
                                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                @endif
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="submit" id="submit" class="form-submit" value="Register" />
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="/login_page/images/signup-image.jpg" alt="sign up image"></figure>
                        <a href="{{route('login')}}" class="signup-image-link">login</a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @include('auth.js')
</body>

</html>