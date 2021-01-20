<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Podsumowanie zamówienia</title>
  </head>
  <body>

<?php
 $pc_count = $_POST['pc_count'];
 $monitor_count = $_POST['monitor_count'];
 $total = 3499*$pc_count + 600*$monitor_count;
echo<<<END
<h2>Podsumowanie złożonego zamówienia</h2>
<table border="1" cellpadding="10" cellspacing="0">
<tr>
  <td>Komputer (3499zł/szt)</td> <td>$pc_count</td>
</tr>
<tr>
  <td>Monitor (699zł/szt)</td> <td>$monitor_count</td>
</tr>
<tr>
  <td>Podsumowanie zamówienia</td> <td>$total PLN</td>
</tr>
</table>
<br>
<a href="index.php"><button type="button" name="button">Powrót</button></a>
END;

?>
  </body>
</html>
