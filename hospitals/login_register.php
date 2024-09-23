<?php
session_start();
include 'connection.php';

// Check if the user is already logged in
if (isset($_SESSION['loggedin'])) {
    // Redirect to the dashboard page or any other authenticated page
    header("Location: dashboard.php");
    exit();
}

if (isset($_POST["login"])) {
    $username = mysqli_real_escape_string($connection, $_POST["username"]);
    $password = mysqli_real_escape_string($connection, $_POST["password"]);
    $hashedPassword = hash('sha256', $password);

    $sql = "SELECT * FROM hospitals WHERE user_name='$username' AND password='$hashedPassword'";
    $result = mysqli_query($connection, $sql) or die("Query failed.");

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $session_id = session_id(); // Get the session identifier
            $_SESSION['loggedin'] = true;
            $_SESSION["username"] = $username;

            // Store the session identifier in the database
            $user_id = $row['id']; // Assuming you have a unique user identifier in the 'hospitals' table
            $sql_update_session = "UPDATE hospitals SET session_id='$session_id' WHERE id='$user_id'";
            mysqli_query($connection, $sql_update_session);

            // Redirect to the dashboard page or any other authenticated page
            header("Location: dashboard.php");
            exit();
        }
    } else {
        $_SESSION['error_message'] = "Username and Password do not match"; // Store the error message in a session variable
        header("Location: login_register.php");
        exit();
    }
}
?>  
<html>

<head>
  <title>Hospital Login/Register</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <style>
    .bg-image {
      background-image: url("./images/login.jpg");
      background-repeat: no-repeat;
      background-size:50%;
      background-position: 30% 40%;
      position: fixed;
      top: 0;
      width: 100%;
      height: 100%;
      z-index: -1; 
    }

    .container {
      margin-top: 250px;
      padding-left:800px;
    }

    .login-form {
      max-width: 300px;
      padding: 20px;
      margin: 0 auto;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
    }

    .login-form h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .form-control {
      padding: 10px;
    }

    .btn {
      background-color: #e74c3c;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
    }

    .btn:hover {
      background-color: #c0392b;
    }

    .form-group.has-error .form-control,
    .form-group.has-error .form-control:focus {
      border-color: #d72424;
      box-shadow: 0 0 6px #ff0000;
    }

    .form-group.has-success .form-control,
    .form-group.has-success .form-control:focus {
      border-color: #21a821;
      box-shadow: 0 0 6px #00ff00;
    }
  </style>
</head>

<body>
  <div>
    <div class="bg-image"></div>
    <div class="container">
      <div class="login-form">
        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#login">Login</a></li>
          <li><a data-toggle="tab" href="#register">Register</a></li>
        </ul>
        <div class="tab-content">
          <div id="login" class="tab-pane fade in active">
            <h2>Login</h2>
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
              <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Enter Your Username" required>
              </div>
              <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Enter Your Password" required>
              </div>
              <div class="form-group">
                <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
              </div>
              <?php
              if (isset($_SESSION['error_message'])) {
                echo '<div class="alert alert-danger" style="font-weight:bold">' . $_SESSION['error_message'] . '</div>';
                unset($_SESSION['error_message']); // Clear the error message after displaying
              }
              ?>
            </form>
          </div>
          <div id="register" class="tab-pane fade">
            <h2>Register</h2>
            <form action="savedata.php" method="post" id="register-form">
              <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Enter Your Username" required>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter Your Email" required>
                <span id="email-validation"></span>
              </div>
              <div class="form-group">
                <input type="number" class="form-control" name="phone" id="phone" placeholder="Enter Your Number" maxlength="10" required>
                <span id="phone-validation"></span>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="hospital_name" placeholder="Enter Your Hospital Name" required>
              </div>
              <div class="form-group">
                <input type="password" class="form-control" name="password" id="password" placeholder="Enter Your Password" required>
              </div>
              <div class="form-group">
                <input type="password" class="form-control" name="confirm_password" id="confirm-password" placeholder="Confirm Password" required>
                <span id="password-validation"></span>
              </div>
              <div class="form-group">
                <button type="submit" name="register" class="btn btn-primary btn-block">Register</button>
              </div>
              <div>
                <p id="success" style="color:rgb(14, 201, 55)"></p>
            </div>  
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <script>
    $(document).ready(function() {
      $('.nav-tabs a').click(function() {
        $(this).tab('show');
      });
    });
 
    var isValid=0;
    function isValidEmail(email) {
      var emailRegex = /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/;
      return emailRegex.test(email);
    }

    function isValidPhone(phone) {
      var phoneRegex = /^\d{10}$/;
      return phoneRegex.test(phone);
    }

    var emailInput = document.getElementById('email');
    var emailValidation = document.getElementById('email-validation');

    var phoneInput = document.getElementById('phone');
    var phoneValidation = document.getElementById('phone-validation');

    var passwordInput = document.getElementById('password');
    var confirmInput = document.getElementById('confirm-password');
    var passwordValidation = document.getElementById('password-validation');

    emailInput.addEventListener('input', function () {
      var email = emailInput.value;

      if (email.length > 0) {
        if (!isValidEmail(email)) {
          emailValidation.innerText = 'Invalid email';
          emailValidation.classList.remove('text-success');
          emailValidation.classList.add('text-danger');
          emailInput.closest('.form-group').classList.remove('has-success');
          emailInput.closest('.form-group').classList.add('has-error');
        } else {
          emailValidation.innerText = '';
          emailValidation.classList.remove('text-danger');
          emailValidation.classList.add('text-success');
          emailInput.closest('.form-group').classList.remove('has-error');
          emailInput.closest('.form-group').classList.add('has-success');
          isValid=1;
        }
      } else {
        emailValidation.innerText = '';
        emailInput.closest('.form-group').classList.remove('has-error');
        emailInput.closest('.form-group').classList.remove('has-success');
      }
    });

    phoneInput.addEventListener('input', function () {
      var phone = phoneInput.value;

      if (phone.length > 0) {
        if (!isValidPhone(phone)) {
          phoneValidation.innerText = 'Invalid phone number';
          phoneValidation.classList.remove('text-success');
          phoneValidation.classList.add('text-danger');
          phoneInput.closest('.form-group').classList.remove('has-success');
          phoneInput.closest('.form-group').classList.add('has-error');
        } else {
          phoneValidation.innerText = '';
          phoneValidation.classList.remove('text-danger');
          phoneValidation.classList.add('text-success');
          phoneInput.closest('.form-group').classList.remove('has-error');
          phoneInput.closest('.form-group').classList.add('has-success');
          isValid=1;

        }
      } else {
        phoneValidation.innerText = '';
        phoneInput.closest('.form-group').classList.remove('has-error');
        phoneInput.closest('.form-group').classList.remove('has-success');
      }
    });

    confirmInput.addEventListener('input', function () {
      var password = passwordInput.value;
      var confirm = confirmInput.value;

      if (password.length > 0 || confirm.length > 0) {
        if (password !== confirm) {
          passwordValidation.innerText = 'Passwords do not match';
          passwordValidation.classList.remove('text-success');
          passwordValidation.classList.add('text-danger');
          passwordInput.closest('.form-group').classList.remove('has-success');
          passwordInput.closest('.form-group').classList.add('has-error');
          confirmInput.closest('.form-group').classList.remove('has-success');
          confirmInput.closest('.form-group').classList.add('has-error');
        } else {
          passwordValidation.innerText = '';
          passwordValidation.classList.remove('text-danger');
          passwordValidation.classList.add('text-success');
          passwordInput.closest('.form-group').classList.remove('has-error');
          passwordInput.closest('.form-group').classList.add('has-success');
          confirmInput.closest('.form-group').classList.remove('has-error');
          confirmInput.closest('.form-group').classList.add('has-success');
          isValid=1;

        }
      } else {
        passwordValidation.innerText = '';
        passwordInput.closest('.form-group').classList.remove('has-error');
        passwordInput.closest('.form-group').classList.remove('has-success');
        confirmInput.closest('.form-group').classList.remove('has-error');
        confirmInput.closest('.form-group').classList.remove('has-success');
      }
    });

    function submitForm() {
        event.preventDefault(); 
    const form = document.getElementById('register-form');
    const formData = new FormData(form);
    // AJAX request
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'savedata.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
        // Handle response from the server
        const response = JSON.parse(xhr.responseText);
        if (response.success) {
            // Reset form
          form.reset();
          // Display success message
          document.getElementById('success').innerText = response.message;
          
        } else {
          // Display error message
          alert(response.message);
        }
      }
    };
    xhr.send(new URLSearchParams(formData));
  }


document.getElementById('register-form').addEventListener('submit', submitForm);

  </script>
</body>

</html>
