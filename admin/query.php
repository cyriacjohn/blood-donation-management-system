<html>

<head>
  <title>Query Details</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <style>
    #sidebar {
      position: fixed;
      margin-top: -20px
    }

    #content {
      position: relative;
      margin-left: 210px
    }

    @media screen and (max-width: 600px) {
      #content {
        position: relative;
        margin-left: auto;
        margin-right: auto;
      }
    }

    #btn-text {
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
</head>
<?php
include 'connection.php';
  include 'session.php';
  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  ?>
<body style="color: black">
<div id="alert-container"></div>

  <div id="header">
    <?php include 'header.php'; ?>
  </div>
  <div id="sidebar">
    <?php $active = "contact";
    include 'sidebar.php'; ?>
  </div>
  <div id="content">
    <div class="content-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 lg-12 sm-12">
            <h1 class="page-title">User Query</h1>
          </div>
        </div>
        <hr>
        <script>
          function clickme(queryId) {
                // Make an AJAX call to update the query status
                
                $.ajax({
                   url: 'update_query_status.php',
                   method: 'POST',
                   data: { id: queryId },
                   success: function(response) {
                  // Update the status to "Read" in the table cell
                  $('#status-' + queryId).text('Read');
                    location.reload();
                  },
                  error: function() {
                  // Not handling right now

                   }
                  });
                  }

        </script>

        <?php
        include 'connection.php';
        $count = 1;
        $sql = "SELECT * FROM contact_us";
        $result = mysqli_query($connection, $sql);
        if (mysqli_num_rows($result) > 0) {
        ?>
          <div class="table-responsive">
            <table class="table table-bordered" style="text-align: center">
              <thead style="text-align: center">
                <th style="text-align: center">S.NO</th>
                <th style="text-align: center">NAME</th>
                <th style="text-align: center">EMAIL</th>
                <th style="text-align: center">PHONE</th>
                <th style="text-align: center">MESSAGE</th>
                <th style="text-align: center">DATE POSTED</th>
                <th style="text-align: center">STATUS</th>
                <th style="text-align: center">ACTION</th>
              </thead>
              <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                  $queryId = $row['query_id'];
                ?>
                  <tr>
                    <td><?php echo $count++; ?></td>
                    <td><?php echo $row['query_name']; ?></td>
                    <td><?php echo $row['query_mail']; ?></td>
                    <td><?php echo $row['query_number']; ?></td>
                    <td><?php echo $row['query_message']; ?></td>
                    <td><?php echo $row['query_date']; ?></td>
                    <?php if ($row['query_status'] == "pending") { ?>
                    <td id="btn-text">
                    <button class="btn btn-primary btn-sm btn-secondary" onclick="clickme(<?php echo $queryId; ?>)">Pending</button>
                    </td>
                    <?php } else { ?>
                    <td id="btn-text"><button type="button" class="btn btn-primary btn-sm btn-success" disabled>Resolved</button></td>
                    <?php } ?>

                    <td id="btn-text">
                      <button class="btn btn-primary btn-sm btn-danger" onclick="window.location.href = 'delete_query.php?id=<?php echo $queryId; ?>';">Delete</a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        <?php } ?>

        
        </div>
      </div>
    </div>
  </div>
  <?php
   } else {
       echo '<div class="alert alert-danger"><b> Please Login First To Access Admin Portal.</b></div>';
       ?>
       <form method="post" name="" action="login.php" class="form-horizontal">
         <div class="form-group">
           <div class="col-sm-8 col-sm-offset-4" style="float:left">

             <button class="btn btn-primary" name="submit" type="submit">Go to Login Page</button>
           </div>
         </div>
       </form>
   <?php }
    ?>

</body>

</html>

