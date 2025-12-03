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
    <form action="" method="GET">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre"><br>
        <label for="edad">Edad:</label>
        <input type="number" name="edad">
        <input type="submit" value="ENVIAR">
    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "GET"){
        $_nombre = $_GET["nombre"];
        $_edad = $_GET["edad"];
        echo "<p>Nombre: $_nombre, Edad: $_edad </p>";
    }
    ?>
    <form action="Formulario2.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre"><br>
        <label for="edad">Edad:</label>
        <input type="number" name="edad">
        <input type="submit" value="ENVIAR">
    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $_nombre = $_POST["nombre"];
        $_edad = $_POST["edad"];
        echo "<p>Nombre: $_nombre, Edad: $_edad </p>";
    }
    ?>
<h1>Ejercicio 1</h1>
<form action="Formulario2.php" method="post">
    <label for="mensaje">Mensaje:</label>
    <input type="text" name="mensaje">
    <label for="veces">Veces:</label>
    <input type="text" name="veces">
    <input type="submit" value="ENVIAR">
</form>
</body>
</html>