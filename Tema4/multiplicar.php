<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    error_reporting( E_ALL ); 
    ini_set("display_errors",1);
    ?>
</head>
<body>
    <form action="" method="get">
        <label for="tabla"></label>
        <input type="number" name="tabla">
        <input type="submit" value="ENVIAR">
    </form>
    <form action="" method="post">
        <label for="tabla"></label>
        <input type="number" name="tabla">
        <input type="submit" value="ENVIAR">
    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "GET"){
        $_tabla = $_GET["tabla"];
        $mult = 0;
        for ($i=1; $i <= $_tabla; $i++) { 
            for ($j=0; $j <= 10; $j++) { 
                $mult = $i*$j;
                echo "$i X $j = ".$mult."<br>";
            }
            echo "<br>";
        }
    }

    else if($_SERVER["REQUEST_METHOD"] == "POST"){
        $_tabla = $_GET["tabla"];
        $mult = 0;
        for ($i=1; $i <= $_tabla; $i++) { 
            for ($j=0; $j <= 10; $j++) { 
                $mult = $i*$j;
                echo "$i # $j = ".$mult."<br>";
            }
            echo "<br>";
        }
    }
    ?>
</body>
</html>