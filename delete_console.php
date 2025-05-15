<?php
$conn = new mysqli("localhost", "root", "", "press_start_db");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $stmt = $conn->prepare("DELETE FROM consoles WHERE id = ?");
  $stmt->bind_param("i", $_POST["id"]);
  if ($stmt->execute() && $stmt->affected_rows > 0) echo "Deleted.";
  else echo "Not found.";
  $stmt->close();
}
?>
<form method="post">
  <input name="id" type="number" placeholder="Console ID to delete" required>
  <button type="submit">Delete Console</button>
</form>
