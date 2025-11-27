<html>
    <body>
       <?php
            <?php
            $guiche = 3;
            switch ($guiche) {
                case 1:
                    echo "IVA";
                    break;
                case 2:
                    echo "IRS";
                    break;
                case 3:
                    echo "Ação tributária";
                    break;
                case 4:
                    echo "Rendimentos";
                    break;
                default:
                    echo "Guichet Inexistente";
            }
            ?>
         </body>
</html>
