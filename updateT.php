<?php

$conn = mysqli_init();
mysqli_real_connect($conn, 'itfnapat63070046.mysql.database.azure.com', 'itf63070046@itfnapat63070046', 'napatart1111@gmail.com', 'itfLab', 3306);
if (mysqli_connect_errno($conn))
{
    die('Failed to connect to MySQL: '.mysqli_connect_error());
}
$bmi = $_POST['bmi']
$name = $_POST['name'];
$weight = $_POST['height'];
$height = $_POST['height'];
$id = $_POST['id'];

$sql = "UPDATE BMITable SET Name = '$name', weight = '$weight', height = '$height', bmi = '$bmi' WHERE ID = '".$id."'";


if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  
mysqli_close($conn);
?>
<html>

<head>
  <META HTTP-EQUIV="Refresh" CONTENT="0;URL=showT.php">
</head>

</html>