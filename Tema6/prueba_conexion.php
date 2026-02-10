<?php
    require "conexion_pdo.php";

    // Promera forma: consultas con querys sencillas

    try {
        $res = $_conexion->query("SELECT * FROM desarrolladoras");
        //var_dump($res);

        while($fila = $res->fetch()){
            echo "Desarrolladora: {$fila["nombre_desarrolladora"]} || Ciudad: {$fila["ciudad"]} || Año de fundacion: {$fila["anno_fundacion"]} <br>";
        }
    } catch (PDOException $e) {
        echo "Error en la consulta: {$e->getMessage()}";
    }

    // Segunda forma: Con prepare y execute pero con consultas preparadas
    try {
        $res = $_conexion->prepare("SELECT * FROM videojuegos WHERE nombre_desarrolladora = :nombre"); // :nombre es un parametro dinamico
        $res->execute(["nombre" => "FromSoftware"]);
        $fila = $res->fetch();
        if($fila){
            echo $fila["titulo"]."<br>";
            while ($fila = $res->fetch()){
                echo $fila["titulo"]."<br>";
                
            }
        }else{
            echo "no hay na";
        }
    } catch (PDOException $e) {
        echo "Consulta mal hecha webon {$e->getMessage()}";
    }

    //Tercera forma con prepare y execute usando fetchALL()

    try{
        $res = $_conexion->prepare("SELECT * FROM desarrolladoras");

        $res->execute();

        $desarrolladoras = $res->fetchAll();

        echo "<pre>".print_r($desarrolladoras)."</pre>";
    }catch(PDOException $e){
        echo "Consulta mal hecha webon {$e->getMessage()}";
    }

    //Insertar un juego con una consulta preparada
   /* try{
        $res = $_conexion->prepare("INSERT INTO videojuegos (titulo, nombre_desarrolladora, anno_lanzamiento, porcentaje_reseñas, horas_duracion) VALUES(:titulo, :nombreD, :annoL, :rese, :duracion)");
        $res->execute([
            "titulo" => "os carriños",
            "nombreD" => "Valve",
            "annoL" => 2000,
            "rese" => 99.0,
            "duracion" => 2
        ]);
        echo "EL jueguito sa metio<br>";
    }catch(PDOException $e){
        echo "Consulta mal hecha webon {$e->getMessage()}";
    }*/

    //Borrar datitos -> cread un formulario con un campo de texto
    //      según el número q entre por el formulario, se borraran el mismo numero de jueguitos (empezando por el primer juego de la BBDD)
    //Usad una consulta preparada con tantos execute() como numero me entre por el formulario
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $numero = $_POST["hola"];
        try{
            $columna = "id_videojuego";
            $direccion = "ASC";
            $consulta = "SELECT id_videojuego FROM videojuegos ORDER BY $columna $direccion";
            $resultado = $_conexion->query($consulta);
            $res = $_conexion->prepare("DELETE FROM videojuegos WHERE id_videojuego =:numerito");
            for ($i=0; $i < $numero; $i++) {
                if($resultado->execute()){
                    $fila = $resultado->fetch();
                    if($fila){
                        $id_primera = $fila["id_videojuego"];
                        $res->execute(["numerito" => $id_primera]);
                        echo "El juego con la id " .$id_primera. " se ha borrado";
                    }
                }
                
            }
        }catch(PDOException $e){
            echo "Consulta mal hecha webon {$e->getMessage()}";
        }
    }
?>
<form action="" method="POST">
    <input type="number" name="hola" placeholder="Cuantos juegos quieres borrar?">
    <input type="submit" value="Enviar">
</form>


<?php
    /*echo "<h1>Transacciones</h1>";
    try{
        $_conexion->beginTransaction();
        $consulta = $_conexion->prepare("INSERT INTO desarrolladoras (nombre_desarrolladora, ciudad, anno_fundacion) VALUES (:pepino, :nabo, :calabacin)");

        $consulta->execute([
            "pepino" => "DawDes1",
            "nabo" => "DawCity",
            "calabacin" => 1
        ]);
        $consulta->execute([
            "pepino" => "DawDes2",
            "nabo" => "DawCity",
            "calabacin" => 1
        ]);
        $consulta->execute([
            "pepino" => "DawDes3",
            "nabo" => "DawCity",
            "calabacin" => 1
        ]);
        $consulta->execute([
            "pepino" => "DawDes4",
            "nabo" => "DawCity",
            "calabacin" => 1
        ]);
        $_conexion->commit();
        echo "Se han insertado correctamente todas las desarrolladoras";
    }catch(PDOException $e){
        $_conexion->rollBack();
        echo $e->getMessage();

    }*/

    try{
    $conexion -> beginTransaction();

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if($_POST["repes"] > 0){ // si es mayor que 0 hace todo
            $repeticiones =$_POST["repes"];
            $consultaJuegos = $conexion -> prepare ("SELECT titulo FROM videojuegos WHERE titulo = :name_game");
            $consultaDesarrolladora = $conexion -> prepare( "SELECT nombre_desarrolladora FROM desarrolladoras WHERE nombre_desarrolladora = :name_dev");
            $insertarDesalldora =  $conexion -> prepare("INSERT INTO desarrolladoras (nombre_desarrolladora, ciudad, anno_fundacion) 
                                                VALUES (:nombre, :ciudad, :anno)");
            $insertarJuego =  $conexion -> prepare("INSERT INTO videojuegos (titulo, nombre_desarrolladora, anno_lanzamiento, porcentaje_reseñas,horas_duracion) 
                                                VALUES (:nombre_juego, :dev, :annito , :resennas , :duracion )");                  
            for ($i=0; $i < $repeticiones ; $i++) { 
                $consultaJuegos -> execute(["name_game" => "DemoGenZ$i"]);
                if($consultaJuegos -> rowCount() == 0){ //Si no existe el juego
                    $consultaDesarrolladora -> execute(["name_dev"=> "GenZDes$i"]);
                    if($consultaDesarrolladora -> rowCount() == 0){ //si no hay desarolladoras
                        $nombre = "GenZDes$i";
                        $ciudad = "japon";
                        $anno = 2020;
                        $insertarDesalldora -> bindValue(":nombre",$nombre, PDO::PARAM_STR);
                        $insertarDesalldora -> bindValue(":ciudad",$ciudad, PDO::PARAM_STR);
                        $insertarDesalldora -> bindValue(":anno",$anno, PDO::PARAM_INT);
                        $insertarDesalldora -> execute();
                        echo "Se ha creado la desarrolladora";
                        $insertarJuego->bindValue(":nombre_juego", "DemoGenz$i" , PDO::PARAM_STR);
                        $insertarJuego -> bindValue(":dev","GenZDes$i", PDO::PARAM_STR);
                        $insertarJuego -> bindValue(":annito", 2020, PDO::PARAM_INT);
                        $insertarJuego->bindValue(":resennas", 99.5, PDO::PARAM_STR); 
                        $insertarJuego -> bindValue(":duracion", 100, PDO::PARAM_INT);

                        $insertarJuego->execute();

                        echo "Juego creado correctamente DemoGenz$i <br>";
                    }
                    else{ //Ya existe desarrrolladora

                        $insertarJuego->bindValue(":nombre_juego", "DemoGenz$i" , PDO::PARAM_STR);
                        $insertarJuego -> bindValue(":dev","GenZDes$i", PDO::PARAM_STR);
                        $insertarJuego -> bindValue(":annito", 2020, PDO::PARAM_INT);
                        $insertarJuego->bindValue(":resennas", 99.5, PDO::PARAM_STR); 
                        $insertarJuego -> bindValue(":duracion", 100, PDO::PARAM_INT);

                        $insertarJuego->execute();
                        echo "Juego creado correctamente DemoGenz$i // ADEMAS EXISISTIA SU DESARROLLADORA <br>";
                    }  
                }else{
                    echo "El juego ya esta creado";
                }
            }
                $conexion->commit();
        }
    }

} catch(PDOException $e){
    $conexion -> rollBack();
    echo $e->getMessage();
}

    ?>
<body>
    <form action="" method="post">
        <input type="number" name="repes" id="">
        <input type="submit" value="Enviar">
    </form>

