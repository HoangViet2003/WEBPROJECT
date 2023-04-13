<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Sign Up</title>

  <!-- Font Icon -->
  <link rel="stylesheet" href="{{asset('assets/fonts/material-icon/css/material-design-iconic-font.min.css')}}" />

  <!-- Main css -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/images-upload.css') }}" />

  <script src="{{asset('assets/js/validateForm.js')}}" defer></script>
</head>

<body></body>
  <div class="main">
    <!-- Sign up form -->
    <section class="signup">
      <div class="container">
        <div class="signup-content">
          <div class="signup-form">
            <h2 class="form-title">Sign up</h2>
            <form name="register-form" class="register-form" id="register-form">
              @csrf
              <div class="form-group">
                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                <input type="text" name="name" id="name" placeholder="Your Name" required />
              </div>
              <div class="form-group">
                <label for="email"><i class="zmdi zmdi-email"></i></label>
                <input type="email" name="email" id="email" placeholder="Your Email" required />
              </div>
              <div class="form-group">
                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                <input type="password" name="pass" id="pass" placeholder="Password" required />
              </div>
              <div class="form-group">
                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password" required />
              </div>
              <div class="form-group">
                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in
                  <a href="#" class="term-service">Terms of service</a></label>
              </div>
              <div class="form-group form-button">
                <input type="submit" name="signup" id="signup" class="form-submit" value="Register" />
              </div>
            </form>
          </div>
          <div class="signup-image">
            <figure>
              <img src="{{asset('assets/img/signup-image.jpg')}}" alt="sign up image" />
            </figure>
            <a href="./login.php" class="signup-image-link">I am already member</a>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- JS -->
  <!-- <script src="vendor/jquery/jquery.min.js"></script> -->
  <script src="{{asset('assets/js/main.js')}}"></script>
</body>
<!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>