
<?php
$host = 'localhost';
$db = 'press_start_db';
$user = 'root';
$pass = '';
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

function clean_input($value) {
  return htmlspecialchars(stripslashes(trim($value)));
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $name = clean_input($_POST['name']);
  $email = clean_input($_POST['cc']);
  $subject = clean_input($_POST['Subject']);
  $message = clean_input($_POST['body']);
  $rating = clean_input($_POST['groceries']);

  $stmt = $conn->prepare("INSERT INTO contact (name, email, subject, message, rating) VALUES (?, ?, ?, ?, ?)");
  $stmt->bind_param("sssss", $name, $email, $subject, $message, $rating);

  if ($stmt->execute()) {
    echo "Contact message submitted successfully.";
  } else {
    echo "Error: " . $stmt->error;
  }

  $stmt->close();
} else {
  echo "Invalid request.";
}

$conn->close();
?>
