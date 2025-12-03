<?php
    $numerito = 1;
    switch ($numerito){
        case 1:
            echo "El numerito es 1";
            break;
        case 2:
            echo "El numerito es 2";
            break;
        default:
            echo "El valor del numerito no esta contemplado";
    }
    echo "<br>";
    $user = "dev";
    switch ($user){
        case "admin":
            echo "Bienvenido $user, tiene acceso a toda la web";
            break;
        case "dev":
            echo "Bienvenido $user, puedes programar en nuestra plataforma";
            break;
        case "cliente":
            echo "Bienvenido $user, puede acceder a nuestros productos";
            break;
        default:
            echo "No se ha registrado";
    }
    echo "<br>";
    $a = rand(1, 150);
    $b = rand(1, 150);
    switch (true){
        case ($a > $b):
            echo "$a es mayor que $b";
            break;
        case(($a == $b)&&($a > 10)):
            echo "Ambos son iguales y mayores que 10";
            break;
        case (($a < 100)||($b < 100)):
            echo "$a o $b son menores que 100";
            break;
        default:
            echo $a." ".$b;
    }
?>