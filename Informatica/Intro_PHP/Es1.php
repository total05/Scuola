<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Numero casuale</title>
  </head>
  <body>
    <?php
    $rand = rand(0,100);
    echo "È stato randomizzato il numero $rand <br>";
    if($rand % 2 == 0)
      echo "<span style='color: green'>Il numero $rand è pari </span>";
      else {
        echo "<span style='color: red'>Il numero $rand è dispari </span>";
      }
    ?>
  </body>
</html>
