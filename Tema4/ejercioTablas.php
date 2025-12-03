<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Tabla 1</h1>
    <table border="1">
        <tr>
            <th rowspan="2">Departamento</th>
            <th colspan="3">Trimestre</th>
            <th rowspan="2">Total</th>
        </tr>
        <tr>
            <td>T1</td>
            <td>T2</td>
            <td>T3</td>
        </tr>
        <tr>
            <td>Informatica</td>
            <td><?php $num = rand(15000,20000); echo $num; $total=$num?></td>
            <td><?php $num = rand(15000,20000); echo $num; $total+=$num?></td>
            <td><?php $num = rand(15000,20000); echo $num; $total+=$num?></td>
            <td><?php echo $total?></td>
        </tr>
        <tr>
            <td>Electronica</td>
            <td><?php $num = rand(12000,15000); echo $num; $total1=$num?></td>
            <td><?php $num = rand(12000,15000); echo $num; $total1+=$num?></td>
            <td><?php $num = rand(12000,15000); echo $num; $total1+=$num?></td>
            <td><?php echo $total1?></td>
        </tr>
        <tr>
            <td>Robotica</td>
            <td><?php $num = rand(10000,12000); echo $num; $total2=$num?></td>
            <td><?php $num = rand(10000,12000); echo $num; $total2+=$num?></td>
            <td><?php $num = rand(10000,12000); echo $num; $total2+=$num?></td>
            <td><?php echo $total2?></td>
        </tr>
        <tr>
            <td colspan="5">Media anual: <?php echo intval(($total+$total1+$total2)/3)?></td>
        </tr>
    </table>

    <h1>Tabla 2</h1>
    <table border="1">
        <tr>
            <th>Alumno</th>
            <th>Nota</th>
        </tr>
        <?php 
            $media = 0;
            $validos = 0;
            for ($i=1; $i <= $random=rand(15,25); $i++) {    
        ?>
        <tr>
            <td><?php echo "Alumno".$i?></td>
            <td><?php $nota = rand(1,20);
                
                switch (true) {
                    case $nota < 5:
                        echo $nota."(susp)";
                        $media += $nota;
                        $validos++;
                        break;
                    case $nota == 5||$nota == 6:
                        echo $nota."(bien)";
                        $media += $nota;
                        $validos++;
                        break;
                    case $nota == 7||$nota == 8:
                        echo $nota."(notable)";
                        $media += $nota;
                        $validos++;
                        break;
                    case $nota == 9||$nota == 10:
                        echo $nota."(sobre)";
                        $media += $nota;
                        $validos++;
                        break;
                    default:
                        echo "nota no valida";
                        break;
                }
                
            ?></td>
        </tr>
        <?php }?>
        <tr>
            <td colspan="2">Media: <?php echo $media/$validos?></td>
        </tr>
    </table>
</body>
</html>