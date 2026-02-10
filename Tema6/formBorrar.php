<?php

require "conexion_pdo.php";

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["borrar"])){
    $num = $_POST["borrar"];
    try{
        $consulta = "DELETE FROM videojuegos ORDER BY id_videojuego ASC LIMIT :limite";
        $consulta = $_conexion->prepare($consulta);

        $consulta->bindValue("limite", $num, PDO::PARAM_INT);

        $consulta->execute();
        
        $borrados = $consulta->rowCount();
        
        echo " Se han borrado $borrados filas<br>";
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
}
?>

<form action="" method="post">
    <input type="text" name="borrar">
    <input type="submit" value="Borrar">
</form>