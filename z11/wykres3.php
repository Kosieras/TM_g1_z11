<?php
header('Content-Type: text/event-stream');
// Połączenie z bazą danych
$host = "localhost";
$user = "kosierap_z11";
$password = "Laboratorium123";
$dbname = "kosierap_z11";
$conn = mysqli_connect($host, $user, $password, $dbname);
// Zapytanie SQL do pobrania danych
$sql = "SELECT id, x1, x2, x3, x4, x5, datetime FROM pomiary ORDER BY id ASC;";
$result = mysqli_query($conn, $sql);
$data = array();

while ($row = mysqli_fetch_assoc($result)) {
  $data[] = array($row['id'], $row['x1'], $row['x2'], $row['x3'], $row['x4'], $row['x5']);
}
//Wykres
require_once 'phplot.php';
$plot = new PHPlot(800,600);
$plot->SetPrintImage(False);  // Do not output the image
$plot->SetFailureImage(False);
$plot->SetTitle('Wykres temperatur x1, x2, x3, x4, x5');
$plot->SetXTitle('Czujnik');
$plot->SetYTitle('Temperatura');
$plot->SetLegend(array('x1', 'x2', 'x3', 'x4', 'x5'));
$plot->SetDataValues($data);
$plot->SetXTickLabelPos('none');
$plot->SetXTickPos('none');
$plot->DrawGraph();
//Wysłanie danych o wykresie
echo "data: ". $plot->EncodeImage("base64") ."\n\n";
?>