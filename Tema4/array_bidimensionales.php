<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $videojuegos = [
            ["FIFA 26", "Deportes", 90],
            ["Hollow Knight", "Plataformas", 30],
            ["Dark Souls", "Soulslike", 40]
        ];

        foreach ($videojuegos as $juego) {
            echo "<p>";
            /*foreach ($juego as $elemento) {
            echo $elemento."||";
            }
            */
            for ($i=0; $i < count($juego); $i++) { 
                if ($i == count($juego)-1)echo $juego[$i];
                else echo $juego[$i]." || ";
            }
            echo "</p>";
        }

        foreach ($videojuegos as $juego) {
            list($nombre, $categoria, $precio) = $juego;
            echo "<p>Nombre: $nombre, Categoria: $categoria, Precio: $precio</p>";
        }

        $videojuegos[] = ["Silkson", "Plataformas", 20];
        $nuevoJuego = ["Super Mario Bros", "Plataformas", 80];
        array_push($videojuegos, $nuevoJuego);
        $nombre = array_column($videojuegos, 0);
    ?>
    <ul>
        <?php foreach ($nombre as $elemento) {?>
            <li><?php echo $elemento?></li>
        <?php } ?>
    </ul>
    <table border="">
    <tr>
        <td>Nombre</td>
        <td>Categoria</td>
        <td>Precio</td>
    </tr>
    <?php
        foreach ($videojuegos as $juego) {
            echo "<tr>";
            foreach ($juego as $elemento) {
                echo "<td>$elemento</td>";
            }
            echo "</tr>";
        }
    ?>
    </table>
    <?php
        //array_multisort($nombre, SORT_ASC, $videojuegos);
        $categoria = array_column($videojuegos, 1);
        $_precio = array_column($videojuegos, 2);
        array_multisort(
            $categoria, SORT_ASC,
            $_precio, SORT_DESC,
            $videojuegos);
    ?>
    <table border="">
    <tr>
        <td>Nombre</td>
        <td>Categoria</td>
        <td>Precio</td>
    </tr>
    <?php
        foreach ($videojuegos as $juego) {
            echo "<tr>";
            foreach ($juego as $elemento) {
                echo "<td>$elemento</td>";
            }
            echo "</tr>";
        }
    ?>
    </table>
</body>
</html>