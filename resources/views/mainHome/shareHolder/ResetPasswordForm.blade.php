<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Reset password</title>
  
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
  
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
  
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

  <style type="text/css">
    @import 'https://static.stayjapan.com/assets/dashboard/application-33c1a06b7784b53cd746d479718b6295c0fcefebb696e78dcee7c68efc92fada.css';

      //
      // Horizontal container
      //
      .horizontal-container {
        margin: 0 auto;
        width: 100%;
        
        @media(min-width: 768px) {
          width: 500px;
        }
        
       
        //
        // Horizontal form
        //
        .horizontal-form-box {
          background-color: #fff;
          border: 1px solid #e5e5e5;
          height: 466px;
          padding: 30px;
          
          .horizontal-info-container {   
            img {
              height: 75px;
              margin-bottom: 20px; 
            }

            .horizontal-heading {
              color: #000;
              font-size: 22px; 
              font-weight: bold; 
              text-transform: capitalize;
            }

            .horizontal-subtitle {
              letter-spacing: 1px;
              margin-bottom: 20px;
              text-align: left;
            }
          }
        
          .horizontal-form {
            label,
            button {
              text-transform: capitalize;
            }

            label {
              color: #000;
              font-weight: normal;
            }
          }
        }
      }

      /* Custom styles for password input and eye icon alignment */
    .o3-form-group {
      position: relative; /* Make the parent relative for absolute positioning of icon */
    }

    .o3-form-group i {
      position: relative;
      right: 5px; /* Align icon to the right of the input */
      margin-top: -6%;
      transform: translateY(-50%); /* Vertically center the icon */
      float: right;
      margin-right: 10px;
      cursor: pointer;
    }

    .horizontal-container{
      background-color: whitesmoke;
      border-radius: 20px;
    }

  </style>
</head>
<body>

  <div class="container" style="margin-top: 40px;">
    <div class="row">
      <div class="col-sm-4 col-lg-4 col-md-4"></div>
      <div class="col-sm-4 col-lg-4 col-md-4">


        <div class="horizontal-container">
          <div class="card">
          <div class="card-body">
              <div class="horizontal-form-box">
                <div class="horizontal-info-container text-center">
                  <img src="{{ URL::to('/') }}/mainHomePage/img/new_logo.png" alt="cool" style="width:200px;height: 50px;margin-bottom: 20px;">
                  <p class="horizontal-heading" style="font-size: 20px;margin:10px;">Reset your password</p>

                </div>
                <form class="horizontal-form" action="{{ route('submit_reset_password', $email) }}" method="POST">
                    @csrf
                    <div class="o3-form-group">
                        <label for="new_password">New password</label>
                        <input type="password" name="new_password" class="o3-form-control o3-input-lg" id="new_password" required autofocus>
                        <i class="fa fa-eye-slash" id="toggleNewPassword" onclick="togglePassword('new_password', 'toggleNewPassword')"></i>
                        @error('new_password')
                          <p style="color:red;">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="o3-form-group">
                        <label for="confirm_password">Confirm new password</label>
                        <input type="password" name="new_password_confirmation" class="o3-form-control o3-input-lg" id="confirm_password" required>
                        <i class="fa fa-eye-slash" id="toggleConfirmPassword" onclick="togglePassword('confirm_password', 'toggleConfirmPassword')"></i>
                    </div>
                    <button type="submit" class="o3-btn o3-btn-primary o3-btn-block">Set new password</button>
                </form>

              </div>
            </div>
        </div>
      </div>
      <div class="col-sm-4 col-lg-4 col-md-4"></div>
    </div>
  </div>


<script>
    // Toggle password visibility
    function togglePassword(inputId, iconId) {
      var inputField = document.getElementById(inputId);
      var icon = document.getElementById(iconId);

      if (inputField.type === "password") {
        inputField.type = "text";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
      } else {
        inputField.type = "password";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
      }
    }
  </script>

</body>
</html>