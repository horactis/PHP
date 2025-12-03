<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors",1);
    ?>
</head>
<body>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["form"] == "ENVIAR"){
        $email = $_POST["correo"]; //Esto habria que validarlo bien
        $email_sanitizado = filter_var($email, FILTER_SANITIZE_EMAIL);
    }
    ?>
    <form action="" method="post">
        <label for="correo">Introduzca su correo: </label>
        <input type="text" name="correo"><br>
        <?php
        if(isset($email,$email_sanitizado)){ //Esto es lo mismo que issit ($email) && (isset($email_sanitizado))
            echo "Email original: $email<br>";
            echo "Email Sanitizado: $email_sanitizado<br>";
        }
        ?>
        <input type="submit" name="form" value="ENVIAR">
    </form>

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["form"] == "Enviar"){
        $cadena = $_POST["cadena"]; //Esto habria que validarlo bien
        $cadena_sanitizado = filter_var($cadena, FILTER_SANITIZE_ENCODED);
    }
    ?>
    <form action="" method="post">
        <label for="cadena">Introduzca una cadena: </label>
        <input type="text" name="cadena"><br>
        <?php
        if(isset($cadena,$cadena_sanitizado)){ //Esto es lo mismo que issit ($email) && (isset($email_sanitizado))
            echo "Cadena original: $cadena<br>";
            echo "Cadena Sanitizado: $cadena_sanitizado<br>";
        }
        ?>
        <input type="submit" name="form" value="Enviar">
    </form>

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["form"] == "Enviar decimal"){
        $decimal = $_POST["decimal"]; //Esto habria que validarlo bien
        $decimal_sanitizado = filter_var($decimal, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    }
    ?>
    <form action="" method="post">
        <label for="decimal">Introduzca un decimal: </label>
        <input type="text" name="decimal"><br>
        <?php
        if(isset($decimal,$decimal_sanitizado)){ //Esto es lo mismo que issit ($email) && (isset($email_sanitizado))
            echo "Decimal original: $decimal<br>";
            echo "Decimal Sanitizado: $decimal_sanitizado<br>";
        }
        ?>
        <input type="submit" name="form" value="Enviar decimal">
    </form>

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["form"] == "Enviar entero"){
        $entero = $_POST["entero"]; //Esto habria que validarlo bien
        $entero_sanitizado = filter_var($entero, FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_ALLOW_FRACTION);
    }
    ?>
    <form action="" method="post">
        <label for="entero">Introduzca un entero: </label>
        <input type="text" name="entero"><br>
        <?php
        if(isset($entero,$entero_sanitizado)){ //Esto es lo mismo que issit ($email) && (isset($email_sanitizado))
            echo "Entero original: $entero<br>";
            echo "Entero Sanitizado: $entero_sanitizado<br>";
        }
        ?>
        <input type="submit" name="form" value="Enviar entero">
    </form>
</body>
</html>