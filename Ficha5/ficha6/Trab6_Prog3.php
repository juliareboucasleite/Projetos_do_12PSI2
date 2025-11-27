<html>
    <body>
       <?php
          <?php
            $temp = 18;
            if ($temp < 10) {
                echo "Frio";
            } elseif ($temp >= 10 && $temp <= 28) {
                echo "Ameno";
            } else {
                echo "Calor";
            }
            ?>
         </body>
</html>
