<html>
  <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>  
  <style>
    .navbar{
      background-color : rgb(139, 77, 77);
    }
    .navbar-text,
    .navbar-brand,
    .nav-link,
    .nav-item{
      color :rgb(255, 255, 255) ;
    }
  </style>
  </head>
<body>
<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-brand" href="home.php"><img src="image/logo.png" height="40px" width="40px"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
      <li class="nav-item">
          <a href="home.php"  <?php if($active=='home') echo "class='nav-link active'" ; else echo "class='nav-link'";?>>Home</a>
        </li>
        <li class="nav-item">
          <a href="donate_regform.php"  <?php if($active=='donate') echo "class='nav-link active'" ; else echo "class='nav-link'";?>>Donate Blood</a>
        </li>
        <li class="nav-item">
          <a href="why_donate.php"  <?php if($active=='why_donate') echo "class='nav-link active'" ; else echo "class='nav-link'";?>>Learn Why?</a>
        </li>
        <li class="nav-item">
          <a href="hospitals/login_register.php" class="nav-link" >Login/Register</a>
        </li>
        <li class="nav-item">
          <a href="contact_us.php" <?php if($active=='contact_us') echo "class='nav-link active'" ; else echo "class='nav-link'";?>>Contact us</a>
        </li>
        <li class="nav-item">
          <a href="about_us.php" <?php if($active=='aboutus') echo "class='nav-link active'" ; else echo "class='nav-link'";?> >About us</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
