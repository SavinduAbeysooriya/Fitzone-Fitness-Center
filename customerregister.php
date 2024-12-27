<!doctype html>
<html lang="en">
<head>
  <title>Register-Fitzone Fitness center</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <style>
    body {
      background-color: #0A0A0A;
      background-image: linear-gradient(160deg, #0A0A0A 0%, #FFD700 100%);
      font-family: 'Arial', sans-serif;
      height: 120vh;
    }
    .login-box {
      margin-top: 10px;
      background-color:  #000010;
      text-align: center;
      box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
      border-radius: 10px;
      
    }
    .login-title {
      text-align: center;
      font-size: 30px;
      letter-spacing: 2px;
      margin-top: 35px;
      font-weight: bold;
      color: #FFD700;
    }
    .login-form {
      margin-top: 25px;
      text-align: left;
    }
    input[type=text], input[type=password], input[type=email] {
      background-color: #333333;
      border: none;
      border-bottom: 2px solid #FFD700;
      border-radius: 0px;
      outline: 0;
      margin-bottom: 20px;
      color: #FFD700;
      padding-left: 0px;
    }
    .form-group {
      margin: 30px;
    }
    .form-control:focus {
      box-shadow: none;
      background-color: #333333;
      color: #FFD700;
    }
    .form-control-label {
      font-size: 15px;
      color: #FFD700;
      letter-spacing: 1px;
    }
    .btn-outline-primary {
      width: 200px;
      height: 50px;
      border-radius: 15px;
      cursor: pointer;
      border-color: #FFD700!important;
      color: #FFD700;
      margin-top: 30px;
    }
    .btn-outline-primary:hover {
      background-color: #FFD700!important;
      color: #000!important;
    }
    .login-button {
      padding-right: 0px;
      text-align: right;
      margin-bottom: 25px;
    }
    .login-text {
      padding-left: 0px;
      color: #FFD700;
    }
    .account-text {
      margin-top: 20px;
      color: #FFD700;
      font-size: 14px;
      margin: 30px;
    }
    .account-text a {
      color: #FFD700;
      text-decoration: underline;
    }
    .back-button {
            position: fixed;  /* Fixed position to keep it on the screen */
            top: 50%;         /* Center vertically */
            right: 20px;      /* Position 20px from the right side */
            transform: translateY(-50%);  /* Adjust for vertical centering */
            display: flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
            background-color: #FFD700;
            color: #000;
            border-radius: 5%;
            font-size: 24px;
            font-weight: bold;
            text-decoration: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s ease;
        }

        .back-button:hover {
            background-color: #FFC107;
        }

        /* Media Queries for Responsive Design */
@media (max-width: 768px) {
    .login-title {
        font-size: 24px; /* Smaller title on mobile */
    }

    .login-box {
        margin: 20px; /* Reduced margin on mobile */
        padding: 20px; /* Add padding for mobile */
    }

    .form-group {
        margin: 15px 0; /* Reduce margin for form groups */
    }

    .btn-outline-primary {
        width: 100%; /* Full width button on mobile */
        height: 45px; /* Smaller button height on mobile */
    }

    .account-text {
        font-size: 12px; /* Smaller account text on mobile */
        margin: 10px; /* Reduce margin on mobile */
    }

    .back-button {
        width: 40px; /* Smaller button */
        height: 40px; /* Smaller button */
        font-size: 20px; /* Smaller font size */
    }
}

@media (max-width: 576px) {
    .login-title {
        font-size: 20px; /* Even smaller title for extra small screens */
    }

    .login-box {
        margin: 10px; /* Further reduce margin for extra small screens */
    }

    .account-text {
        font-size: 10px; /* Smaller account text for extra small screens */
    }

    .btn-outline-primary {
        height: 40px; /* Smaller button height for extra small screens */
    }

    .back-button {
        width: 35px; /* Smaller button */
        height: 35px; /* Smaller button */
        font-size: 18px; /* Smaller font size */
    }
}
  </style>
</head>
<body class="d-flex align-items-center">
<a href="javascript:history.back()" class="back-button">←</a>
  <div class="container">
    <div class="row justify-content-center" style="margin:20px;">
      <div class="col-lg-6 col-md-8 login-box">
        <div class="col-lg-12 login-title">
          Registration
        </div>

        <div class="col-lg-12 login-form">
        <form action="includes/customerregister.inc.php" method="POST">
            <div class="form-group">
              <label class="form-control-label">Username</label>
              <input type="text" class="form-control" id="fullname" name="fullname" required>

              
            </div>
            <div class="form-group">
              <label class="form-control-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" required>

            </div>
            <div class="form-group">
              <label class="form-control-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" required>

            </div>
            <div class="form-group">
              <label class="form-control-label">Password repeat</label>
              <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>

            </div>
            <div class="account-text">
            Do you have an account? <a href="customerlogin.php">Login here</a>
            </div>
            <div class="col-12 login-btm login-button justify-content-center d-flex">
              <button type="submit" name="submit" class="btn btn-outline-primary">Register</button>
        
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>
</html>
