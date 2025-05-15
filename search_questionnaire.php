<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Search Questionnaire</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container my-5">
  <h2 class="mb-4 text-center">Search Gaming Feedback</h2>
  <form method="post" class="mb-4">
    <input type="text" name="searchTerm" class="form-control" placeholder="Search by Game or Developer">
    <button type="submit" class="btn btn-primary mt-2">Search</button>
  </form>

  <?php
  if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST["searchTerm"])) {
    $conn = new mysqli("localhost", "root", "", "press_start_db");
    if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

    $term = "%" . $conn->real_escape_string($_POST["searchTerm"]) . "%";
    $sql = "SELECT * FROM questionnaire WHERE favorite_game LIKE ? OR favorite_developer LIKE ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $term, $term);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
      echo '<table class="table table-bordered"><tr><th>Game</th><th>Developer</th><th>Console</th><th>Genres</th><th>Message</th></tr>';
      while($row = $result->fetch_assoc()) {
        echo "<tr><td>{$row['favorite_game']}</td><td>{$row['favorite_developer']}</td><td>{$row['console']}</td><td>{$row['genres']}</td><td>{$row['message']}</td></tr>";
      }
      echo '</table>';
    } else {
      echo '<div class="alert alert-warning">No results found.</div>';
    }

    $stmt->close();
    $conn->close();
  }
  ?>
</div>
</body>
</html>
