<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-template-rows: 1fr;
            gap: 10px;
        }

    </style>
</head>
<body>
    <?php
    #Solo tenemos dos operaciones, sort_asc y sort_desc
    /**
     * Ej 1 rapido: Ordenar por el precio de mas barato a mas caro
     * Ej 2: Ordenar por categoria en orden alfabetico inverso
     * Ej 3: Ordenar por categoria y si son iguales, ordenar por precio descendente
     */
    $videojuegos = [
            ["FIFA 26", "Deportes", 90],
            ["Hollow Knight", "Plataformas", 30],
            ["Dark Souls", "Soulslike", 40]
        ];
        $videojuegos[] = ["Silkson", "Plataformas", 20];
        $nuevoJuego = ["Super Mario Bros", "Plataformas", 80];
        array_push($videojuegos, $nuevoJuego);
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

    <?php
    //ej 1
        $_precio = array_column($videojuegos, 2); 
        array_multisort(
            $_precio, SORT_ASC,
            $videojuegos);
    ?>
<table border="2">
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
    //ej 2
        $_categoria = array_column($videojuegos, 1); 
        array_multisort(
            $_categoria, SORT_DESC,
            $videojuegos);
    ?>
<table border="3">
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
    //ej 3
        $categoria = array_column($videojuegos, 1);
        $_precio = array_column($videojuegos, 2); 
        array_multisort(
            $categoria,SORT_ASC,
            $_precio, SORT_DESC,
            $videojuegos);
    ?>
    <table border="4" >
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