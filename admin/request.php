<html>
<head>
  <title>Blood Requests</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <style>
    #sidebar {
      position: fixed;
      margin-top: -20px;
    }

    #content {
      position: relative;
      margin-left: 210px;
    }

    @media screen and (max-width: 600px) {
      #content {
        position: relative;
        margin-left: auto;
        margin-right: auto;
      }
    }

    #he {
      font-size: 14px;
      font-weight: 600;
      text-transform: uppercase;
      padding: 3px 7px;
      color: #fff;
      text-decoration: none;
      border-radius: 3px;
      align: center
    }
  </style>

  <script>
    $(document).ready(function() {
      function fetchTable() {
        $.ajax({
          url: 'fetch_table.php',
          type: 'GET',
          success: function(response) {
            $('#table-body').html(response);
          }
        });
      }

      fetchTable();

      setInterval(fetchTable, 5000);
    });
  </script>
</head>

<?php
include 'connection.php';
include 'session.php';
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
?>
<body style="color:black">
  <div id="header">
    <?php include 'header.php'; ?>
  </div>
  <div id="sidebar">
    <?php $active = "request";
    include 'sidebar.php'; ?>
  </div>
  <div id="content">
    <div class="content-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 lg-12 sm-12">
            <h1 class="page-title">Request List</h1>
          </div>
        </div>
        <hr>
        <?php
        if (isset($_GET['error'])) {
          $error = urldecode($_GET['error']);
          echo '<div id="error-container"></div>';

  // JavaScript to add the error message and remove it after 5 seconds
          echo '<script>
          document.addEventListener("DOMContentLoaded", function() {
          var errorContainer = document.getElementById("error-container");
          var errorMessage = document.createElement("div");
          errorMessage.className = "alert alert-danger";
          errorMessage.textContent = "' . $error . '";
          errorContainer.appendChild(errorMessage);

          setTimeout(function() {
            errorMessage.remove();
            var url = window.location.href;
            var updatedUrl = url.split("?")[0]; // Remove the query parameters from the URL
            history.replaceState(null, "", updatedUrl); // Update the URL without the error parameter
          }, 5000); // 5000 milliseconds = 5 seconds
          });
          </script>';
        }
        ?>
        <div class="table-responsive">
          <table class="table table-bordered" style="text-align:center">
            <thead style="text-align:center">
              <th style="text-align:center;width:10px;">S.NO</th>
              <th style="text-align:center;width:10px;">BLOOD GROUP</th>
              <th style="text-align:center;width:10px;">REQUIRED UNITS</th>
              <th style="text-align:center;width:10px;">HOSPITAL</th>
              <th style="text-align:center;width:10px;">PRIORITY</th>
              <th style="text-align:center;width:10px;">ACTION</th>
            </thead>
            <tbody id="table-body">
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

<?php } else {
  echo '<div class="alert alert-danger"><b> Please Login First To Access Admin Portal.</b></div>';
  ?>
  <form method="post" name="" action="login.php" class="form-horizontal">
    <div class="form-group">
      <div class="col-sm-8 col-sm-offset-4" style="float:left">
        <button class="btn btn-primary" name="submit" type="submit">Go to Login Page</button>
      </div>
    </div>
  </form>
<?php } ?>
