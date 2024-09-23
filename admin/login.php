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

    $sql = "SELECT * FROM admin_info WHERE admin_username='$username' AND admin_password='$hashedPassword'";
    $result = mysqli_query($connection, $sql) or die("Query failed.");

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $session_id = session_id(); // Get the session identifier
            $_SESSION['loggedin'] = true;
            $_SESSION["username"] = $username;

            // Store the session identifier in the database
            $user_id = $row['admin_id']; // Assuming you have a unique user identifier in the 'admin' table
            $sql_update_session = "UPDATE admin_info SET session_id='$session_id' WHERE admin_id='$user_id'";
            mysqli_query($connection, $sql_update_session);

            // Redirect to the dashboard page or any other authenticated page
            header("Location: dashboard.php");
            exit();
        }
    } else {
        $_SESSION['error_message'] = "Username and Password do not match"; // Store the error message in a session variable
        header("Location: login.php");
        exit();
    }
}
?> 

<html>

<head>
  <title>Admin Login</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <style>
    .bg-image {
      background-image: url("./admin_image/backgrn.png");
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center;
      position: fixed;
      top: 0;
      width: 100%;
      height: 100%;
      z-index: -1;
      filter: blur(2px);
    }

    .container {
      margin-top: 250px;
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
  </style>
</head>

<body>
<div>
  <div class="bg-image"></div>
  <div class="container">
    <div class="login-form">
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
    if(isset($_SESSION['error_message'])) {
      echo '<div class="alert alert-danger" style="font-weight:bold">'.$_SESSION['error_message'].'</div>';
      unset($_SESSION['error_message']); // Clear the error message after displaying
    }
  ?>
      </form>
    </div>
  </div>
  </div>
 

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>


