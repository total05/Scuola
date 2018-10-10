<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Numero casuale</title>
  </head>
  <body>
    <?php
    $rand = rand(0,100);

    boolval isPrime($var){
      $divisors = 0;
      for ($i=1; $i < $var; $i++) {
        if($var % $i == 0) $divisors ++;
      }

      if ($divisors > 2) {
        return true;
        else {
          return false;
        }
      }
    }
    
    echo "È stato randomizzato il numero $rand <br>";
    if(isPrime($rand))
      echo "<span style='color: green'>Il numero $rand è primo </span>";
      else {
        echo "<span style='color: red'>Il numero $rand non è primo </span>";
      }


    ?>
  </body>
</html>
