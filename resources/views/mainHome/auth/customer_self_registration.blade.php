<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name','our') }}</title>
    <!-- Font Icon -->
    <link rel="stylesheet" href="{{URL::to('/')}}/CustomerSelfRegister/fonts/material-icon/css/material-design-iconic-font.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="{{URL::to('/')}}/CustomerSelfRegister/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style type="text/css">
        /* Ensure the section takes up the full viewport height */
        .signup {
            display: flex;
            justify-content: center; /* Center horizontally */
            align-items: center;     /* Center vertically */
            height: 100vh;           /* Full viewport height */
            margin: 0;               /* Remove default margin */
        }

        /* Container styles */
        .container {
            text-align: center;      /* Center text inside the container */
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        }

        /* Ensure content within container is centered */
        .signup-content {
            display: flex;
            justify-content: center; /* Center content horizontally */
            align-items: center;     /* Center content vertically if needed */
        }

        /* Form title styling */
        .form-title {
            margin: 0;               /* Remove default margin */
            font-size: 1.5rem;       /* Adjust font size as needed */
        }

       /* #eye_icon_id{
            z-index: 100;
            margin: 0;
            padding: 0;
            margin-right: -200px;
            margin-top: -50px;
        }*/

            .relative {
                position: relative;
            }

            .absolute {
                position: absolute;
            }

            .right-3 {
                right: 12px; /* Positioning the eye icon to the right inside the input */
            }

            .top-1/2 {
                top: 50%; /* Vertically center the icon */
                margin-top: -10px;
            }

            .transform {
                transform: translateY(-50%); /* Adjust the icon to be centered vertically */
            }

            .cursor-pointer {
                cursor: pointer; /* Make the eye icon clickable */
            }

            input[type="password"] {
                padding-right: 30px; /* Add space for the eye icon inside the input */
            }

    </style>
</head>
<body>
    <div class="main">

        @if($statusValue == 'Not Allowed' && $registrationDone == 'Not yet')

            <!-- Allowed block -->
            <section>
                <div class="container" style="margin-top:-10%; box-shadow:0px 8px 16px 0px rgba(0, 0, 0, 0.2);">
                    <h1><u>{{ config('app.name','laravel') }}</u></h1><br>
                    <div class="signup-content">
                        <h2 style="font-size:20px;margin-top: -50px;">Please be patient and wait for admin approval.</h2>
                    </div>
                </div>
            </section>

        @elseif($statusValue == 'Allowed' && $registrationDone == 'Not yet')

            <!-- Sign up form -->
            <section class="signup">
                <div class="container" style="margin-top:-20%;box-shadow:0px 8px 16px 0px rgba(0, 0, 0, 0.2);">
                    <div class="signup-content">
                        <div class="signup-form">
                            <h2 class="form-title">Register here</h2>
                            @if($errors->any())
                                <ul>
                                @foreach($errors->all() as $error)
                                    <li style="color:red;">{{ $error }}</li>
                                @endforeach
                                </ul>
                            @endif
                            
                            <form method="POST" action="{{ route('main.submit_customer_registration',$id) }}" class="register-form" id="register-form">
                                @csrf
                                <div class="form-group">
                                    <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                    <input type="text" name="school_name" id="name" placeholder="Enter school name" value="{{ $school_name }}" />
                                </div>
                                <div class="form-group">
                                    <label for="email"><i class="zmdi zmdi-email material-icons-name"></i></label>
                                    <input type="email" name="email" id="email" placeholder="Enter email" value="{{ $email }}" readonly />
                                </div>
                                <div class="form-group">
                                    <label for="phone"><i class="zmdi zmdi-phone"></i></label>
                                    <input type="phone" name="phone" id="phone" placeholder="Enter phone" value="{{ $phone }}" readonly />
                                </div>
                                <div class="form-group">
                                    <label for="username"><i class="zmdi zmdi-account"></i></label>
                                    <input type="text" name="username" id="username" placeholder="Username" value="{{ old('username') }}" />
                                </div>
                                <div class="form-group">
                                    
                                    <div class="relative">
                                        <label for="password"><i class="fas fa-lock"></i></label>
                                        <input type="password" name="password" id="password" placeholder="Password"/>
                                        <span id="toggle-password" class="absolute right-3 top-1/2 transform -translate-y-1/2 cursor-pointer">
                                            <i class="fas fa-eye"></i>  <!-- Eye icon for password -->
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="relative">

                                        <label for="re-enter-password"><i class="zmdi zmdi-lock-outline"></i></label>
                                    
                                        <input type="password" name="password_confirmation" id="re-enter-password" placeholder="Repeat your password"/>
                                        <span id="toggle-confirm-password" class="absolute right-3 top-1/2 transform -translate-y-1/2 cursor-pointer">
                                            <i class="fas fa-eye"></i>  <!-- Eye icon for confirm password -->
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group form-button">
                                    <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                                </div>
                            </form>

                            <script>
                                // JavaScript to toggle password visibility for both password fields
                                const togglePassword = document.getElementById('toggle-password');
                                const passwordField = document.getElementById('password');
                                const toggleConfirmPassword = document.getElementById('toggle-confirm-password');
                                const confirmPasswordField = document.getElementById('re-enter-password');
                                
                                // Toggle visibility for password field
                                togglePassword.addEventListener('click', function() {
                                    const type = passwordField.type === 'password' ? 'text' : 'password';
                                    passwordField.type = type;

                                    // Toggle the eye icon for password
                                    if (type === 'password') {
                                        togglePassword.innerHTML = '<i class="fas fa-eye"></i>';  // Show eye
                                    } else {
                                        togglePassword.innerHTML = '<i class="fas fa-eye-slash"></i>';  // Show eye-slash
                                    }
                                });

                                // Toggle visibility for confirm password field
                                toggleConfirmPassword.addEventListener('click', function() {
                                    const type = confirmPasswordField.type === 'password' ? 'text' : 'password';
                                    confirmPasswordField.type = type;

                                    // Toggle the eye icon for confirm password
                                    if (type === 'password') {
                                        toggleConfirmPassword.innerHTML = '<i class="fas fa-eye"></i>';  // Show eye
                                    } else {
                                        toggleConfirmPassword.innerHTML = '<i class="fas fa-eye-slash"></i>';  // Show eye-slash
                                    }
                                });
                            </script>



                        </div>
                        <div class="signup-image">
                            <figure><img src="{{URL::to('/')}}/CustomerSelfRegister/images/signup-image.jpg" alt="sing up image"></figure>
                            <p class="signup-image-link" style="text-decoration: none;color:gray;">You can modify your info in your account after registration !</p>
                        </div>
                    </div>
                </div>
            </section>
        @elseif($statusValue == 'Allowed' && $registrationDone == 'Done')
            <!-- Allowed block -->
            <section>
                <div class="container" style="margin-top:-10%; box-shadow:0px 8px 16px 0px rgba(0, 0, 0, 0.2);">
                    <div class="signup-content">
                        <h2 style="font-size:20px;padding: 5px;">You are already a registered user of {{ config('app.name', 'our') }}. <a href="{{ route('main.login.page') }}" style="color:blue;text-decoration: none;" target="self">Login here</a> </h2>
                    </div>
                </div>
            </section>

        @endif

    </div>

    <!-- JS -->
    <script src="{{URL::to('/')}}/CustomerSelfRegister/vendor/jquery/jquery.min.js"></script>
    <script src="{{URL::to('/')}}/CustomerSelfRegister/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>