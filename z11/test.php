  <?php  
$dbhost = "localhost";
    $dbuser = "kosierap_z11";
    $dbpassword = "Laboratorium123";
    $dbname = "kosierap_z11";
    $polaczenie = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
    $rezultat = mysqli_query($polaczenie, "SELECT * FROM pomiary");
    echo "<table cellpadding=5 border=1>";
    echo "<tr><td>id</td><td>x1</td><td>x2</td><td>x3</td><td>x4</td><td>x5</td><td>Data/Godzina</td></tr>\n";
    while ($wiersz = mysqli_fetch_array($rezultat)) {
      $id = $wiersz[0];
      $x1 = $wiersz[1];
      $x2 = $wiersz[2];
      $x3 = $wiersz[3];
      $x4 = $wiersz[4];
      $x5 = $wiersz[5];
      $datetime = $wiersz[6];
      echo "<tr><td>$id</td><td>$x1</td><td>$x2</td><td>$x3</td><td>$x4</td><td>$x5</td><td>$datetime</td></tr>\n";
    }
    echo "</table>";
    mysqli_close($polaczenie);
?>