<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <label for="partida">Partidas</label>
        <input type="number" name="partida">
        <br>
        <label for="intento">Intentos</label>
        <input type="number" name="intento">
        <br>
        <input type="submit" value="JUGAR">
    </form>
    <br>
    <?php
    if ($_SERVER["REQUEST_METHOD"]=="POST") {
        $intento = $_POST["intento"];
        if ($intento <= 1) {
            $intento = 2;
        }
        $partida = $_POST["partida"];
        if ($partida <= 0) {
            $partida = 1;
        }
        $nPartida = 0;
        $dado1 = 0;
        $dado2 = 0;
        $punto = 0;
        $turno = 1;
        $terminar = false;
        $nWin = 0;
        $nLose = 0;
        $nEmpate = 0;
        do {
            do {
                $dado1 = rand(1,6);
                $dado2 = rand(1,6);
                $suma = $dado1+$dado2;
                    if ($turno == 1) {
                        if(($suma == 7)||($suma == 11)){
                            echo "Turno $turno<hr>Dado 1: $dado1<br>Dado 2: $dado2<br>Total: $suma<br>VICTORIA!!!!";
                            $terminar = true;
                            $nWin++;
                        }else if(($suma == 2)||($suma == 3)||($suma == 12)){
                            echo "Turno $turno<hr>Dado 1: $dado1<br>Dado 2: $dado2<br>Total: $suma<br>Derrota :C";
                            $terminar = true;
                            $nLose++;
                        }else{
                            echo "Turno $turno<hr>Dado 1: $dado1<br>Dado 2: $dado2<br>Total: $suma<br>Punto = $suma<br><br>";
                            $turno++;
                            $punto = $suma;
                        }
                    }else if($turno == $intento){
                        echo "Turno $turno<hr>Dado 1: $dado1<br>Dado 2: $dado2<br>Total: $suma<br>Empate<br>";
                        $terminar = true;
                        $nEmpate++;
                    }else{
                        if($suma == 7){
                            echo "Turno $turno<hr>Dado 1: $dado1<br>Dado 2: $dado2<br>Total: $suma<br>Derrota :C";
                            $terminar = true;
                            $nLose++;
                        }else if($suma == $punto){
                            echo "Turno $turno<hr>Dado 1: $dado1<br>Dado 2: $dado2<br>Total: $suma<br>VICTORIA!!!!";
                            $terminar = true;
                            $nWin++;
                        }else{
                            echo "Turno $turno<hr>Dado 1: $dado1<br>Dado 2: $dado2<br>Total: $suma<br><br>";
                            $turno++;
                        }
                    }
            } while (!$terminar);
            echo "<br><br>";
            $nPartida++;
            $turno = 1;
            $terminar = false;
        } while($nPartida != $partida);
        echo "N Victorias: $nWin N Derrotas: $nLose N Empates: $nEmpate";
    }
    
    ?>
</body>
</html>