<?php
$time = date('H:i:s', time()); 
$x1 = $_POST['x1']; 
$x2 = $_POST['x2']; 
$x3 = $_POST['x3']; 
$x4 = $_POST['x4']; 
$x5 = $_POST['x5']; 
$ac = $_POST['ac']; 
$movement = $_POST['movement']; 
$co = $_POST['co']; 
$heating = $_POST['heating']; 
$alarm = $_POST['alarm']; 
if (IsSet($_POST['x1']) && IsSet($_POST['x2']) && IsSet($_POST['x3']) && IsSet($_POST['x4']) && IsSet($_POST['x5']))
{
	$dbhost="localhost"; 
  $dbuser="kosierap_z11"; 
  $dbpassword="Laboratorium123"; 
  $dbname="kosierap_z11"; 
  $connection = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
if (!$connection)
{
echo " MySQL Connection error." . PHP_EOL;
echo "Errno: " . mysqli_connect_errno() . PHP_EOL; echo "Error: " . mysqli_connect_error() . PHP_EOL; exit;
}
$result = mysqli_query($connection, "INSERT INTO pomiary (x1,x2,x3,x4,x5,ac,movement,co,heating,alarm) VALUES ('$x1','$x2','$x3','$x4','$x5','$ac','$movement','$co','$heating','$alarm');") or die ("DB error: $dbname"); mysqli_close($connection);
}

header ('Location: formularz.php');
?>