<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Submitted Feedback</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container my-5">
  <h2 class="mb-4 text-center">All Questionnaire Submissions</h2>

  <?php
  $conn = new mysqli("localhost", "root", "", "press_start_db");
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT favorite_game, favorite_developer, console, genres, message FROM questionnaire";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    echo '<table class="table table-bordered table-striped bg-white shadow">';
    echo '<thead class="table-dark"><tr><th>Game</th><th>Developer</th><th>Console</th><th>Genres</th><th>Message</th></tr></thead>';
    echo '<tbody>';
    while($row = $result->fetch_assoc()) {
      echo "<tr>
              <td>{$row['favorite_game']}</td>
              <td>{$row['favorite_developer']}</td>
              <td>{$row['console']}</td>
              <td>{$row['genres']}</td>
              <td>{$row['message']}</td>
            </tr>";
    }
    echo '</tbody></table>';
  } else {
    echo "<div class='alert alert-warning'>No records found.</div>";
  }

  $conn->close();
  ?>
</div>
</body>
</html>
