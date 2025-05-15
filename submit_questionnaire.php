<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Questionnaire Submission</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container my-5">
  <h2 class="mb-4 text-center">Your Gaming Thoughts!</h2>

  <?php
  function clean($value) {
    return htmlspecialchars(stripslashes(trim($value)));
  }

  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $favoriteGame = clean($_POST['favoriteGame'] ?? 'N/A');
    $favoriteDeveloper = clean($_POST['favoriteDeveloper'] ?? 'N/A');
    $console = clean($_POST['console'] ?? 'N/A');
    $message = clean($_POST['message'] ?? 'N/A');

    // the games genres checkboxes
    $genres = [];
    if (isset($_POST['action'])) $genres[] = 'Action';
    if (isset($_POST['rpg'])) $genres[] = 'RPG';
    if (isset($_POST['puzzle'])) $genres[] = 'Puzzle';
    $genreText = empty($genres) ? 'None Selected' : implode(', ', $genres);

    echo '
    <table class="table table-bordered table-striped bg-white shadow">
      <tr><th>Favorite Game</th><td>' . $favoriteGame . '</td></tr>
      <tr><th>Favorite Developer</th><td>' . $favoriteDeveloper . '</td></tr>
      <tr><th>Console Choice</th><td>' . $console . '</td></tr>
      <tr><th>Genres</th><td>' . $genreText . '</td></tr>
      <tr><th>Your Thoughts</th><td>' . $message . '</td></tr>
    </table>';
  } else {
    echo '<div class="alert alert-danger">Invalid request method.</div>';
  }
  ?>

  <div class="text-center mt-4">
    <a href="questionnaire.html" class="btn btn-secondary">Go Back</a>
  </div>
</div>
</body>
</html>