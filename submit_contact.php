<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Contact Submission</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container my-5">
  <h2 class="mb-4 text-center">Contact Submission Received</h2>

  <?php
  // we apply input validation
  function clean_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
  }

  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = clean_input($_POST['name'] ?? 'N/A');
    $email = clean_input($_POST['cc'] ?? 'N/A');
    $subject = clean_input($_POST['Subject'] ?? 'N/A');
    $message = clean_input($_POST['body'] ?? 'N/A');
    $rating = clean_input($_POST['groceries'] ?? 'N/A');

    // the rating description
    $ratingText = match ($rating) {
      "1" => "Excellent",
      "2" => "Good",
      "3" => "Bad",
      default => "Not specified"
    };

    echo '
    <table class="table table-bordered bg-white shadow">
      <tr><th>Name</th><td>' . $name . '</td></tr>
      <tr><th>Email</th><td>' . $email . '</td></tr>
      <tr><th>Subject</th><td>' . $subject . '</td></tr>
      <tr><th>Message</th><td>' . $message . '</td></tr>
      <tr><th>Rating</th><td>' . $ratingText . '</td></tr>
    </table>
    ';
  } else {
    echo '<div class="alert alert-danger">Invalid access method.</div>';
  }
  ?>

  <div class="text-center mt-4">
    <a href="index.html" class="btn btn-secondary">Back to Home</a>
  </div>
</div>

</body>
</html>