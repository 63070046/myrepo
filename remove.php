<?php
header("Refresh:5; url=index.php");
exit(0);

$conn = mysqli_init();
mysqli_real_connect($conn, 'itfnapat63070046.mysql.database.azure.com', 'itf63070046@itfnapat63070046', 'napatart1111@gmail.com', 'itfLab', 3306);
if (mysqli_connect_errno($conn))
{
    die('Failed to connect to MySQL: '.mysqli_connect_error());
}

$sql = 'DELETE FROM guestbook WHERE ID = '.$_GET['ID'].'';


if (mysqli_query($conn, $sql)) {
    echo "Data removed";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
mysqli_close($conn);
?>