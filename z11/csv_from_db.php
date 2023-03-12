<?php
$dbhost="localhost"; $dbuser="kosierap_z11"; $dbpassword="Laboratorium123"; $dbname="kosierap_z11"; $polaczenie = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
if (!$polaczenie)
{
echo "SQL error 1." . PHP_EOL;
echo "Errno: " . mysqli_connect_errno() . PHP_EOL; echo "Error: " . mysqli_connect_error() . PHP_EOL; exit;
}
header("Content-Type: text/event-stream"); while (!connection_aborted())
{
$rezultat = mysqli_query($polaczenie, "SELECT * FROM pomiary ORDER by id DESC Limit 1") or die ("SQL error 2: $dbname"); while ($wiersz = mysqli_fetch_array ($rezultat))
{
$id = $wiersz[0]; $x1 = $wiersz[1]; $x2 = $wiersz[2]; $x3 = $wiersz[3]; $x4 = $wiersz[4]; $x5 = $wiersz[5];$ac = $wiersz[7];$movement = $wiersz[8];$co = $wiersz[9];$heating = $wiersz[10];$alarm = $wiersz[11];
}
echo 'data:'.$x1."\t".$x2."\t".$x3."\t".$x4."\t".$x5."\t".$ac."\t".$movement."\t".$co."\t".$heating."\t".$alarm."\n\n";
while (ob_get_level() > 0) { ob_end_flush(); }
flush();
sleep(1); 
} mysqli_close($polaczenie); ?>