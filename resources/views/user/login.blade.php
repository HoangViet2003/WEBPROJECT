<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Log In</title>

        <!-- Font Icon -->
        <link
            rel="stylesheet"
            href="{{
                asset(
                    'assets/fonts/material-icon/css/material-design-iconic-font.min.css'
                )
            }}"
        />

        <!-- Main css -->
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />

        <!-- Login JS file -->
        <script src="{{ asset('assets/js/api/login.js') }}" defer></script>
    </head>

    <body>
        <div class="main">
            <!-- Sign in Form -->
            <section class="sign-in">
                <div class="container">
                    <div class="signin-content">
                        <div class="signin-image">
                            <figure>
                                <img
                                    src="{{
                                        asset('assets/img/signin-image.jpg')
                                    }}"
                                    alt="sign in image"
                                />
                            </figure>
                            <a href="./signup" class="signup-image-link"
                                >Create an account</a
                            >
                        </div>

                        <div class="signin-form">
                            <h2 class="form-title">Log In</h2>
                            <form class="register-form" id="login-form">
                                <div class="form-group">
                                    <label for="your_name"
                                        ><i
                                            class="zmdi zmdi-account material-icons-name"
                                        ></i
                                    ></label>
                                    <input
                                        type="email"
                                        name="email"
                                        id="your_email"
                                        placeholder="Your Email"
                                        type="email"
                                        autocomplete="current-email"
                                        required
                                    />
                                </div>
                                <div class="form-group">
                                    <label for="your_pass"
                                        ><i class="zmdi zmdi-lock"></i
                                    ></label>
                                    <input
                                        type="password"
                                        name="password"
                                        id="your_pass"
                                        placeholder="Password"
                                        autocomplete="current-password"
                                        required
                                    />
                                </div>
                                <div class="form-group">
                                    <input
                                        type="checkbox"
                                        name="remember-me"
                                        id="remember-me"
                                        class="agree-term"
                                    />
                                    <label
                                        for="remember-me"
                                        class="label-agree-term"
                                        ><span><span></span></span>Remember
                                        me</label
                                    >
                                </div>
                                <div class="form-group form-button">
                                    <input
                                        type="submit"
                                        name="signin"
                                        id="signin"
                                        class="form-submit"
                                        value="Log in"
                                    />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    </body>
</html>
ƒ
