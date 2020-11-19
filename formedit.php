<!DOCTYPE html>
<html>

<head>
  <?php
  $conn = mysqli_init();
  mysqli_real_connect($conn, 'itfnapat63070046.mysql.database.azure.com', 'itf63070046@itfnapat63070046', 'napatart1111@gmail.com', 'itfLab', 3306);
  if (mysqli_connect_errno($conn)) {
    die('Failed to connect to MySQL: ' . mysqli_connect_error());
  }

  $sql = 'SELECT FROM guestbook WHERE ID = ' . $_GET['ID'] . '';
  ?>
  <title>Comment Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h2>Edit form</h2>
    </div>
    <div class="container">
      <form action="update.php" method="POST">
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" class="form-control" id="idName" placeholder="Enter name" name="name">
        </div>
        <div class="form-group">
          <label for="comment">Comment:</label>
          <input type="text" class="form-control" id="idComment" placeholder="Enter comment" name="comment">
        </div>
        <div class="form-group">
          <label for="url">Link:</label>
          <input type="text" class="form-control" id="idLink" placeholder="Enter Link" name="link">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
</body>
<?php mysqli_close($conn); ?>
</html>