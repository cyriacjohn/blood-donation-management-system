<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $queryId = $_POST['id'];

  // Perform the update query
  $sql = "UPDATE contact_us SET query_status = 'resolved' WHERE query_id = $queryId";
  if (mysqli_query($connection, $sql)) {
    echo "Status updated successfully.";
  } else {
    echo "Error updating status: " . mysqli_error($connection);
  }
} else {
  echo "Invalid request.";
}
header("Location: donor_list.php");

mysqli_close($connection);
?>
