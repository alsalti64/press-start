
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Console List</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container my-5">
  <h2 class="text-center mb-4">Console Legacy - PHP Class Example</h2>

  <?php
  class Console {
    public $name;
    public $year;
    public $maker;

    public function __construct($name, $year, $maker) {
      $this->name = $name;
      $this->year = $year;
      $this->maker = $maker;
    }

    public function toRow() {
      return "<tr><td>{$this->name}</td><td>{$this->year}</td><td>{$this->maker}</td></tr>";
    }
  }

  $consoles = [
    new Console("PlayStation 5", 2020, "Sony"),
    new Console("Xbox Series X", 2020, "Microsoft"),
    new Console("Nintendo Switch", 2017, "Nintendo"),
    new Console("PlayStation 2", 2000, "Sony"),
    new Console("Sega Genesis", 1988, "Sega")
  ];

  // This function is for to display table
  function displayConsoles($consoleArray) {
    echo '<table class="table table-bordered table-striped bg-white shadow">';
    echo '<thead class="table-dark"><tr><th>Name</th><th>Release Year</th><th>Manufacturer</th></tr></thead>';
    echo '<tbody>';
    foreach ($consoleArray as $console) {
      echo $console->toRow();
    }
    echo '</tbody></table>';
  }

  //This function is showing the console table
  displayConsoles($consoles);
  ?>

  <div class="text-center mt-4">
    <a href="index.html" class="btn btn-secondary">Back to Home</a>
  </div>
</div>
</body>
</html>
