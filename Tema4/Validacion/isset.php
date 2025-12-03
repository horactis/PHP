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
    <p><b>isset()</b>verifica si una variable está definida y no es NULL</p>
    <p><b>empty()</b>devuelve true si la variable no esta definida, tiene el valor 0,
    "", null o es un array vacio</p>

    <?php
    echo "<h3> caso 0.1: isset() devuelve true y empty() devuelve true</h3>";
    $valor = 0;
    echo "<p>Valor: 0</p>";
    if(isset($valor)) echo "<p>La variuable \$valor esta definida</p>";
    else echo "<p> La variable \$valor no esta definida o es NULL</p>";

    if(empty($valor)) echo "<p>La variable \$valor es considerada vacía</p>";
    else echo "<p>La variable \$valor NO es considerada vacía</p>";

    echo "<h3> Caso 0.2: isset() devuelve false y empty() devuelve false</h3>";
    unset($valor);
    echo "<p>Valor: undefined</p>";
    if(isset($valor)) echo "<p>La variable \$valor se considera vacía</p>";
    else echo "<p>La variable \$valor NO esta vacia</p>";
    
    echo "<h3> Caso 1: mi variable tiene el valor 'juan' </h3>";
    $nombre = "juan";
    if(isset($nombre)) echo "<p>La variuable \$valor esta definida</p>";
    else echo "<p> La variable \$valor no esta definida o es NULL</p>";

    if(empty($nombre)) echo "<p>La variable \$valor es considerada vacía</p>";
    else echo "<p>La variable \$valor NO es considerada vacía</p>";
    
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        //LOS SELECTS SI NO SE ESCOGE NINGUNA OPCION HACE QUE LA CLAVE--VALOR NO EXISTA,
        //POR ESO HAY QUE USAR ISSET PARA LOS SELECT--OPTION
        $tmp_nombre = $_POST["nombre"];
        $tmp_edad = $_POST["edad"];

        if(!isset($_POST["genero"])){
            $err_genero = "<p>Inserta un género</p>";
        }else{
            $genero = $_POST["genero"];
        }
        if($tmp_nombre == ""){
            $err_nombre = "<p>Inserta un nombre</p>";
        }else{
            $nombre = $tmp_nombre;
        }
        if($tmp_edad == ""){
            $err_edad = "<p>Inserta una edad valida</p>";
        }elseif($tmp_edad < 0){
            $err_edad = "<p>Mete un número mayor a cero</p>";
        }else{
            $edad = $tmp_edad;
        }

    }
    ?>

    <form action="" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre">
        <?php if(isset($err_nombre)) echo $err_nombre;?><br>
        <label for="edad">Edad:</label>
        <input type="number" name="edad">
        <?php if(isset($err_edad)) echo $err_edad;?><br>
        <select name="genero">
            <option disabled selected>--ELIGE UNA OPCION--</option>
            <option value="M">Mujer</option>
            <option value="H">Hombre</option>
            <option value="O">Otro</option>
        </select>
        <?php if(isset($err_genero)) echo $err_genero?>
        <input type="submit" value="ENVIAR">
    </form>

    <?php
    if((isset($genero))&&(isset($nombre))&&(isset($edad))){
        echo "<p>Nombre: $nombre, Edad: $edad, Genero: $genero</p>";
    }
    ?>
</body>
</html>