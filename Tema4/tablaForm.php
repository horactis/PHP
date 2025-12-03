<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="get">
        <label for="ele">Elementos:</label>
        <input type="number" name="ele">
        <label for="column">Columnas:</label>
        <input type="number" name="column">
        <input type="submit" value="Enviar">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $_ele = $_GET["ele"];
        $_column = $_GET["column"];
        $_filas;
    ?>
    <table>
            <?php
            for ($i=0; $i < $_ele; $i++) {
                echo "<tr>";
                for ($j=0; $j < $_column; $j++) {
                    echo "<td>$i</td>";
                }
                echo "</tr>";
            }
            ?>
        </tr>
    </table>
    <?php }?>
</body>
</html>