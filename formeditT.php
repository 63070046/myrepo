<!DOCTYPE html>
<html>

<head>
  <?php
  $conn = mysqli_init();
  mysqli_real_connect($conn, 'itfnapat63070046.mysql.database.azure.com', 'itf63070046@itfnapat63070046', 'napatart1111@gmail.com', 'itfLab', 3306);
  $id = $_GET['ID'];

	$sql = 'SELECT * FROM guestbook WHERE ID = '.$id.'';
	$query = mysqli_query($conn, $sql);
	if(!$query) {
		header('Location: show.php');
	}
	else {
		$data = mysqli_fetch_assoc($query);
	}?>
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
          <input type="text" name="id" value="<?php echo $data['ID']; ?>" class="form-control d-none" required>
          <label for="name">Name:</label>
          <input type="text" class="form-control" id="idName" placeholder="Enter name" name="name" value="<?php echo $data['Name']; ?>">
        </div>
        <div class="form-group">
          <label for="comment">Comment:</label>
          <input type="text" class="form-control" id="idComment" placeholder="Enter comment" name="comment" value="<?php echo $data['Comment']; ?>">
        </div>
        <div class="form-group">
          <label for="url">Link:</label>
          <input type="text" class="form-control" id="idLink" placeholder="Enter Link" name="link" value="<?php echo $data['Link']; ?>">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
</body>
<?php mysqli_close($conn); ?>
</html>