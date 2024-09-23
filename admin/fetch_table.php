
<?php

include 'connection.php';

$count = 1;
$sql = "SELECT * FROM blood_requests ORDER BY priority DESC";
$result = mysqli_query($connection, $sql);

if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<td>' . $count++ . '</td>';
    echo '<td>' . $row['blood_group'] . '</td>';
    echo '<td>' . $row['units'] . '</td>';
    echo '<td>' . $row['hospital'] . '</td>';
    echo '<td>' . ($row['priority'] == 1 ? 'high' : 'low') . '</td>';
    if ($row['request_status'] == 'pending') {
      $blood_group = base64_encode($row['blood_group']);
      echo '<td id="he" style="width:100px">';
      echo '<button type="button" class="btn btn-primary btn-sm btn-success" onclick="approverequest(' . $row['id'] . ', ' . $row['units'] . ', \'' .$blood_group. '\');">APPROVE</button>';
      echo '<button type="button" class="btn btn-primary btn-sm btn-danger" onclick="rejectrequest(' . $row['id'] . ');">REJECT</button>';
      echo '</td>';
    } elseif ($row['request_status'] == 'approved') {
      echo '<td id="btn-text">';
      echo '<button type="button" class="btn btn-primary btn-sm btn-success" disabled>APPROVED</button>';
      echo '</td>';
    } elseif ($row['request_status'] == 'rejected') {
      echo '<td id="btn-text">';
      echo '<button type="button" class="btn btn-primary btn-sm btn-danger" disabled>REJECTED</button>';
      echo '</td>';
    }
    echo '</tr>';
  }
} else {
  echo '<tr><td colspan="6">No requests found.</td></tr>';
}
mysqli_close($connection);
?>
<script>
  function approverequest(id, units, blood_group) {
    // Construct the URL with the parameters and redirect to approveRequest.php

    window.location.href = 'approve.php?id=' + id + '&units=' + units + '&blood_group=' + blood_group;
  }
  function rejectrequest(id){
    window.location.href = 'reject.php?id=' + id;
  }
</script>