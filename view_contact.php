<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Contact Submissions</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container my-5">
  <h2 class="mb-4 text-center">Contact Form Submissions</h2>

  <?php
  $conn = new mysqli("localhost", "root", "", "press_start_db");
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT name, email, subject, message, rating FROM contact";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    echo '<table class="table table-bordered table-striped bg-white shadow">';
    echo '<thead class="table-dark"><tr><th>Name</th><th>Email</th><th>Subject</th><th>Message</th><th>Rating</th></tr></thead>';
    echo '<tbody>';
    while($row = $result->fetch_assoc()) {
      echo "<tr>
              <td>{$row['name']}</td>
              <td>{$row['email']}</td>
              <td>{$row['subject']}</td>
              <td>{$row['message']}</td>
              <td>{$row['rating']}</td>
            </tr>";
    }
    echo '</tbody></table>';
  } else {
    echo "<div class='alert alert-warning'>No contact messages found.</div>";
  }

  $conn->close();
  ?>
</div>
</body>
</html>
