<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        /**
         * SINTAXIS DEL BUCLE FOR:
         * 
         * for(inicialización;condición;actualización){
         *      código del bucle
         * }
         */
        
        for ($i=0; $i <= 10; $i++) { 
            if($i < 10)echo $i.", ";
            else echo $i;
        }
        echo "<pre>";
        for ($i=1; $i <= 10; $i++) {
            for ($j=1; $j <= 10; $j++) {
                if($i == $j) echo $j;
                else echo "   ";
            } 
            echo "\n";
        }
        echo "</pre>";

        

    ?>
</body>
</html>