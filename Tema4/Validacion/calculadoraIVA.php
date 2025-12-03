<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $tmp_precio = $_POST["precio"];
        if(!isset($_POST["tipo"])){
            $err_tipo = "<p>Inserta un Tipo de IVA</p>";
        }else{
            $tipo = $_POST["tipo"];
        }
        if($tmp_precio == ""){
            $err_precio = "<p>Inserta un precio</p>";
        }elseif($tmp_precio < 0){
            $err_precio = "<p>Intruduce un precio positivo</p>";     
        }else{
            $precio = $tmp_precio;
        }
    }
    ?>
    <form action="" method="post">
        <label for="precio">Precio:</label>
        <input type="number" name="precio">
        <?php if(isset($err_precio)) echo $err_precio;?><br>
        <label for="tipo">Tipo IVA</label>
        <select name="tipo">
            <option disabled selected>Elige</option>
            <option value="general">General</option>
            <option value="reducido">Reducido</option>
            <option value="superreducido">Superreducido</option>
        </select><br>
        <?php if(isset($err_tipo)) echo $err_tipo?>
        <input type="submit" value="CALCULAR">
    </form>

    <?php
    if((isset($precio))&&(isset($tipo))){
        switch (true) {
            case ($tipo=="general"):
                echo "Precio con IVA: ".$precio*1.21;
                break;
            case ($tipo=="reducido"):
                echo "Precio con IVA: ".$precio*1.10;
                break;
            default:
                echo "Precio con IVA: ".$precio*1.04;
                break;
        }
    }
    ?>
</body>
</html>