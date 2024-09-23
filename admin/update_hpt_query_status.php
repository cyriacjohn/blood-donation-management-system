<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $queryId = $_POST['id'];

  // Perform the update query
  $sql = "UPDATE contact_admin SET query_status = 'resolved' WHERE id = $queryId";
  if (mysqli_query($connection, $sql)) {
    echo "Status updated successfully.";
  } else {
    echo "Error updating status: " . mysqli_error($connection);
  }
} else {
  echo "Invalid request.";
}
header("Location: hospital_query.php");

mysqli_close($connection);
?>
