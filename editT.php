<html>

<head>
  <title>ITF Lab</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
  <?php
  $conn = mysqli_init();
  mysqli_real_connect($conn, 'itfnapat63070046.mysql.database.azure.com', 'itf63070046@itfnapat63070046', 'napatart1111@gmail.com', 'itfLab', 3306);
  if (mysqli_connect_errno($conn)) {
    die('Failed to connect to MySQL: ' . mysqli_connect_error());
  }
  $res = mysqli_query($conn, 'SELECT * FROM bmitable');
  ?>
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h2>Edit Table</h2>
      <p>ITF Napat Phobutdee 63070046</p>
    </div>
  </div>
  <div class="container">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>ชื่อ</th>
          <th>น้ำหนัก</th>
          <th>ส่วนสูง</th>
          <th>BMI</th>
          <th>Remove</th>
        </tr>
      </thead>
      <?php
      while ($Result = mysqli_fetch_array($res)) {
      ?>
        <tr>
          <td><?php echo $Result['ID']; ?></td>
          <td><?php echo $Result['Name']; ?></td>
          <td><?php echo $Result['weight']; ?></td>
          <td><?php echo $Result['height']; ?></td>
          <td><?php echo $Result['bmi']; ?></td>
          <td><a href="removeT.php?ID=<?php echo $Result['ID'];?>" role = "button" class="btn btn-danger">Remove</button></td>
        </tr>
    </table>
  </div>
  <?php
  mysqli_close($conn);
  ?>
</body>

</html>