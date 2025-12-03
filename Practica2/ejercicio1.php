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
    $productos = [
        [
        "nombre" => "Camiseta",
        "precio" => 15.99,
        "cantidad" => 10
        ],
        [
        "nombre" => "Pantalón",
        "precio" => 29.99,
        "cantidad" => 5
        ],
        [
        "nombre" => "Zapatos",
        "precio" => 49.99,
        "cantidad" => 8
        ],
        [
        "nombre" => "Gorra",
        "precio" => 12.50,
        "cantidad" => 15
        ],
        [
        "nombre" => "Chaqueta",
        "precio" => 59.99,
        "cantidad" => 3
        ]
    ];
    ?>
    <form action="" method="post">
        <h1>Inventario de Tienda</h1>
        <label for="formato">Formato de visualización</label>
        <input type="text" name="formato" placeholder="tabla, listaO o listaN">
        <input type="submit" value="Mostrar">
    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $formato = $_POST["formato"];
        $precio = 0;
        $cantidad = 0;
        $subtotal = 0;
        $totalC = 0;
        $sumSub = 0;
        if ($formato == "tabla") {
            echo "<table width='100%' cellpading='15' border='2'>";
            echo "<tr>";
            echo "<th>Producto</th>";
            echo "<th>Precio(€)</th>";
            echo "<th>Cantidad</th>";
            echo "<th>Subtotal(€)</th>";
            echo "</tr>";
            foreach($productos as $categoria => $dato){
                echo "<tr>";
                foreach ($dato as $a => $valor) {
                    echo "<td>$valor</td>";
                    if($a == "precio") $precio = $valor;
                    if($a == "cantidad"){
                        $cantidad = $valor;
                        $totalC += $valor;
                    }
                    $subtotal = $precio*$cantidad;
                }
                echo "<td>".$subtotal."</td>";
                echo "</tr>";
                $sumSub += $subtotal;
            }
            echo "<td colspan='2'><b>TOTALES</b></td>";
            echo "<td>".$totalC."</td>";
            echo "<td>".$sumSub."</td>";

            echo "</table>";
        }elseif($formato == "listaO"){
            echo "<ol>";
            foreach($productos as $categoria => $dato){
                echo "<li>";
                foreach ($dato as $a => $valor) {
                    if($a != "nombre"){
                    echo $a.": ";
                    }
                    echo $valor." - ";
                    if($a == "precio") $precio = $valor;
                    if($a == "cantidad"){
                        $cantidad = $valor;
                        $totalC += $valor;
                    }
                    $subtotal = $precio*$cantidad;
                }
                echo "Subtotal: ".$subtotal;
                echo "</li>";
                $sumSub += $subtotal;
            }
            echo "</ol>";
            echo "<p><b>Total Productos: $totalC</b></p>";
            echo "<p><b>Valor total: $sumSub</b></p>";
        }elseif($formato == "listaN"){
            echo "<ul>";
            foreach($productos as $categoria => $dato){
                echo "<li>";
                foreach ($dato as $a => $valor) {
                    if($a != "nombre"){
                    echo $a.": ";
                    }
                    echo $valor." - ";
                    if($a == "precio") $precio = $valor;
                    if($a == "cantidad"){
                        $cantidad = $valor;
                        $totalC += $valor;
                    }
                    $subtotal = $precio*$cantidad;
                }
                echo "Subtotal: ".$subtotal;
                echo "</li>";
                $sumSub += $subtotal;
            }
            echo "</ul>";
            echo "<p><b>Total Productos: $totalC</b></p>";
            echo "<p><b>Valor total: $sumSub</b></p>";
        }else{
            echo "Por favor, introduce ‘tabla’, ‘listaO’ o ‘listaN’.";
        }
    }
    ?>
</body>
</html>