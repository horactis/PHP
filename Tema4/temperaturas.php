<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="temperatura">Temperatura:</label>
        <input type="number" name="temperatura">
        <br>
        <label for="unidad_original">Grados:</label>
        <select name="unidad_original">
            <option value="C">Celsius</option>
            <option value="F">Fahrenheit</option>
            <option value="K">Kelvin</option>
        </select>
        <br>
        <label for="unidad_final">Cambio:</label>
        <select name="unidad_final">
            <option value="C">Celsius</option>
            <option value="F">Fahrenheit</option>
            <option value="K">Kelvin</option>
        </select>
        <input type="submit" value="Enviar">
    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $_temperatura = $_POST["temperatura"];
        $_unidadO = $_POST["unidad_original"];
        $_unidadF = $_POST["unidad_final"];

        switch (true) {
            case (($_unidadO == "C")&&($_unidadF == "F")):
                echo "$_temperatura ºCelsius son ".(($_temperatura*9/5)+32)." ºFahrenheit";
                break;
            case (($_unidadO == "C")&&($_unidadF == "K")):
                echo "$_temperatura ºCelsius son ".($_temperatura+273.15)." ºKelvin";
                break;
            case (($_unidadO == "C")&&($_unidadF == "C")):
                echo "$_temperatura ºCelsius son ".($_temperatura)." ºCelsius";
                break;
            case (($_unidadO == "F")&&($_unidadF == "F")):
                echo "$_temperatura ºFahrenheit son ".($_temperatura)." ºFahrenheit";
                break;
            case (($_unidadO == "F")&&($_unidadF == "C")):
                echo "$_temperatura ºFahrenheit son ".(($_temperatura-32)*5/9)." ºCelsius";
                break;
            case (($_unidadO == "F")&&($_unidadF == "K")):
                echo "$_temperatura ºFahrenheit son ".(($_temperatura-32)*5/9+273.15)." ºKelvin";
                break;
            case (($_unidadO == "K")&&($_unidadF == "K")):
                echo "$_temperatura ºKelvin son ".($_temperatura)." ºKelvin";
                break;
            case (($_unidadO == "k")&&($_unidadF == "C")):
                echo "$_temperatura ºKelvin son ".($_temperatura-273.15)." ºCelsius";
                break;
            default:
                echo "$_temperatura ºKelvin son ".(($_temperatura-273.15)*9/5+32)." ºFahrenheit";
                break;
        }
    }
    ?>
</body>
</html>