<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    function extraerArray(int $numero):array{
        $res = [];
        while ($numero >= 1){
            $res[] = $numero % 10;
            $numero /= 10;
            $numero = intval($numero);
        }
        krsort($res);
        $res = array_values($res);
        return $res;
    }
    ?>
    <form action="" method="POST">
        <label for="">Array 1:</label>
        <input type="number" name="array1">
        <br>
        <label for="">Array 2:</label>
        <input type="number" name="array2">
        <br>
        <input type="submit" value="Enviar">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = $_POST["array1"];
        $num2 = $_POST["array2"];
        $arr1 = extraerArray($num1);
        $arr2 = extraerArray($num2);
        sort($arr1);
        sort($arr2);
        if($arr1 == $arr2) echo "<h1>Son iguales :D </h1>";
        else echo "<h1>No son iguales </h1>";
    }
    ?>
</body>
</html>