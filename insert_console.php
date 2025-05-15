<?php
$conn = new mysqli("localhost", "root", "", "press_start_db");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $stmt = $conn->prepare("INSERT INTO consoles (name, release_year, manufacturer) VALUES (?, ?, ?)");
  $stmt->bind_param("sis", $_POST["name"], $_POST["year"], $_POST["maker"]);
  if ($stmt->execute()) echo "Console added successfully.";
  else echo "Error: " . $stmt->error;
  $stmt->close();
}
?>
<form method="post">
  <input name="name" placeholder="Console Name" required><br>
  <input name="year" type="number" placeholder="Release Year" required><br>
  <input name="maker" placeholder="Manufacturer" required><br>
  <button type="submit">Add Console</button>
</form>
