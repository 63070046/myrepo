<?php

$conn = mysqli_init();
mysqli_real_connect($conn, 'itfnapat63070046.mysql.database.azure.com', 'itf63070046@itfnapat63070046', 'napatart1111@gmail.com', 'itfLab', 3306);
if (mysqli_connect_errno($conn))
{
    die('Failed to connect to MySQL: '.mysqli_connect_error());
}

$id = $_POST['ID']
$name = $_POST['name'];
$comment = $_POST['comment'];
$link = $_POST['link'];


$sql = "UPDATE guestbook SET Name = '$name', Comment = '$comment', Link = '$link' WHERE ID = '".$id."'";


if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  
mysqli_close($conn);
?>