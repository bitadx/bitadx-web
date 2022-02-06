<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <title>BITADX - LogIn</title>
  </head>

  <body>
    <main>
        <header>
            <div class="login-toplink">
                <i class="fas fa-arrow-circle-left"></i>
                <!-- <a class="back-btn" href="index.html">Back</a> -->
                <a class="signup-btn" href="{{url('register')}}">Sign Up</a>
            </div>

            <h1>Log into Bitadx</h1>
        </header>

        <section class="justify-content-center">
<!-- left menu -->
            <div class="left-menu">
            <form method="POST" action="{{ route('login') }}">
                        @csrf
                <div class="form-group">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror input-box" placeholder="Enter Email" id="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="password" class="form-control input-box gap @error('password') is-invalid @enderror" placeholder="Password" id="pwd" name="password" required autocomplete="current-password">
                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-group form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember me
                    </label>
                </div>
                <button type="submit" class="btn-box">Log-in</button>
                </form>
                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
            </div>

<!-- center image OR -->
            <!-- <div class="ctr-img">
                <img src="frontend/img/or_icon.png" alt="seprator">
            </div> -->

<!-- Right side btn menu -->
            <!-- <div class="right-menu">
                <div><button class="right-btn-box"><i class="fab fa-google"></i>Continue with Google</button></div>
                <div><button class="right-btn-box"><i class="fab fa-facebook"></i>Continue with Facebook</button></div>
                <div><button class="right-btn-box"><i class="fab fa-apple"></i>Continue with Apple</button></div>
                <div><button class="right-btn-box"><i class="fab fa-twitter"></i>Continue with Twitter</button></div>
                <div><button class="right-btn-box"><i class="fab fa-instagram"></i>Continue with Instagram</button></div>
            </div> -->
        </section>
        <!-- <p class="pwd">Having Trouble<a href="pwd.html"> Log-In?</a></p> -->
    </main>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>
