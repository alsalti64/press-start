
<?php
$host = 'localhost';
$db = 'press_start_db';
$user = 'root';
$pass = '';
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

function clean($value) {
  return htmlspecialchars(stripslashes(trim($value)));
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $game = clean($_POST['favoriteGame']);
  $developer = clean($_POST['favoriteDeveloper']);
  $console = clean($_POST['console']);
  $message = clean($_POST['message']);
  $genres = [];

  if (isset($_POST['action'])) $genres[] = 'Action';
  if (isset($_POST['rpg'])) $genres[] = 'RPG';
  if (isset($_POST['puzzle'])) $genres[] = 'Puzzle';

  $genreStr = implode(', ', $genres);

  $stmt = $conn->prepare("INSERT INTO questionnaire (favorite_game, favorite_developer, console, genres, message) VALUES (?, ?, ?, ?, ?)");
  $stmt->bind_param("sssss", $game, $developer, $console, $genreStr, $message);

  if ($stmt->execute()) {
    echo "Feedback submitted successfully.";
  } else {
    echo "Error: " . $stmt->error;
  }

  $stmt->close();
} else {
  echo "Invalid request.";
}

$conn->close();
?>
