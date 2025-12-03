<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informde de Ventas</title>
    <style>
        table, tr, td{
            border: 2px solid black;
            border-collapse: collapse;
            padding: 2px;
        }

        td:empty{
            border: none;
        }
    </style>
</head>
<body>
    
    <table>
        <thead>
            <tr>
            <td rowspan="2">Departamento</td>
            <td colspan="3"> Trimestre</td>
            <td rowspan="2">Total</td>
        </tr>
        <tr>
            <td>T1</td>
            <td>T2</td>
            <td>T3</td>
        </tr>
        </thead>

        <tbody>
            <?php
            $dep = rand(1,3);
            $totalInfo = 0;
            $totalEle = 0;
            $totalRobo = 0;
            $array = []; 
            for ($j=0; $j < $dep; $j++) {
                array_push($array,[]);
                for ($k=0; $k < 3; $k++) { 
                    $array[$j][$k] = rand(14000, 20000);
                    $totalInfo += $array[$j][$k];
                }                     
            }
                

            for ($i=0; $i < $dep; $i++) { 
            
            ?> 

            <tr>
                <td>Informatica <?php echo $i?></td>
                <?php 
                for ($j=0; $j < 3; $j++) {
            ?>                             
                <td><?php echo $array[$i][$j]; ?></td>
             
                
                <?php
                 }
                 if ($i == 0){ 
                ?>
                <td rowspan="<?php echo $dep ?>"><?php echo $totalInfo ?></td>


                <?php } } ?>
                
            </tr>
            

            

        </tbody>

        <tfoot>
            <tr>
                <td colspan="4">Total entero: </td>
                <td></td>
            </tr>
        </tfoot>


    </table>

    <?php 
    function crearDepartment($cant){
        for ($j=1; $j <= $cant; $j++) { 
            $Precio = rand(14000, 20000);
        }
    }
    
    ?> 


</body>
</html>