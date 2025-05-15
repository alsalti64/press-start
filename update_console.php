<?php
$conn = new mysqli("localhost", "root", "", "press_start_db");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $stmt = $conn->prepare("UPDATE consoles SET name = ?, release_year = ?, manufacturer = ? WHERE id = ?");
  $stmt->bind_param("sisi", $_POST["name"], $_POST["year"], $_POST["maker"], $_POST["id"]);
  if ($stmt->execute() && $stmt->affected_rows > 0) echo "Updated.";
  else echo "No record updated.";
  $stmt->close();
}
?>
<form method="post">
  <input name="id" type="number" placeholder="Console ID" required><br>
  <input name="name" placeholder="New Name" required><br>
  <input name="year" type="number" placeholder="New Year" required><br>
  <input name="maker" placeholder="New Manufacturer" required><br>
  <button type="submit">Update Console</button>
</form>
