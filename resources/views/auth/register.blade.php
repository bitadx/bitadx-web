<!doctype html>
<html lang="en">
  <head>
<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<!-- user agent shtylesheet -->
    <link rel="stylesheet" href="css/style.css">

<!-- google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

<!-- awesome icons -->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">


<!-- page title -->
    <title>BITADX - Sign-Up</title>
  </head>

  <body>
    <main>
        <header>
            <div class="login-toplink">
                <i class="fas fa-arrow-circle-left"></i>
                <!-- <a class="back-btn" href="index.html">Back</a> -->
                <a class="log-in-btn" href="{{ url('login') }}">Log-In</a>
            </div>

            <h1>Sign up - Bitadx</h1>
        </header>

        <section class="justify-content-center">
<!-- left menu -->
            <div class="left-menu sign-up-gap">
            <form method="POST" action="{{ route('register') }}">
                        @csrf
                  <div class="form-group">
                    <input type="text" class="form-control @error('name') is-invalid @enderror input-box" placeholder="Full Name" id="fname"name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                  <div class="form-group">
                    <input type="email" class="form-control input-box gap @error('email') is-invalid @enderror" placeholder="Enter Email" id="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                  <input type="number" class="form-control input-box gap @error('contact_no') is-invalid @enderror" placeholder="Mobile No" id="mob" name="contact_no" value="{{ old('contact_no') }}" required autocomplete="contact_no">
                  @error('contact_no')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                  @enderror
              </div>
                <div class="form-group">
                    <input type="password" class="form-control input-box gap @error('password') is-invalid @enderror" placeholder="Password" id="pwd" name="password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="password" class="form-control input-box gap @error('password_confirmation') is-invalid @enderror" placeholder="Confirm Password" id="pwd" name="password_confirmation" required autocomplete="new-password">
                    @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn-box">Create account</button>
                </form>
            </div>

<!-- center image OR -->
            <!-- <div class="ctr-img">
                <img src="img/or_icon.png" alt="seprator">
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
        <p class="pol-para">By creating an account, with Bitadx you agree to our Terms of Service <br>
          and have read and understood the Privacy Policy.</p>
    </main>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>
