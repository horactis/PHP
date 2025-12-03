<?php
    $num1 = rand(1,100);
    $num2 = rand(1,100);

    function operaciones($num1,$num2){
        echo "La suma de $num1 y $num2 da ".$num1+$num2."<br>";
        echo "La multiplicacion de $num1 y $num2 da ".$num1*$num2."<br>";

        if ($num1 == $num2){
            echo "La resta de $num1 y $num2 da ".$num1-$num2."<br>";
            echo "La division entre $num1 y $num2 da 1<br>";
            echo "El modulo entre $num1 y $num2 da 0<br>";
        }elseif ($num1 < $num2){
            echo "La resta de $num2 y $num1 da ".$num2-$num1."<br>";
            echo "La division entre $num2 y $num1 da ".$num2/$num1."<br>";
            echo "El modulo entre $num2 y $num1 da ".$num2%$num1."<br>";
        }else{
            echo "La resta de $num1 y $num2 da ".$num1-$num2."<br>";
            echo "La division entre $num1 y $num2 da ".$num1/$num2."<br>";
            echo "El modulo entre $num1 y $num2 da ".$num1%$num1."<br>";
        }

        
    }
    operaciones($num1,$num2);

    function operaciones2($num1,$num2){
        echo "La suma de $num1 y $num2 da ".$num1+$num2."<br>";
        echo "La multiplicacion de $num1 y $num2 da ".$num1*$num2."<br>";

        switch(true){
            case ($num1 == $num2):
                echo "La resta de $num1 y $num2 da ".$num1-$num2."<br>";
                echo "La division entre $num1 y $num2 da 1<br>";
                echo "El modulo entre $num1 y $num2 da 0<br>";
                break;
            
            case ($num1 < $num2):
                echo "La resta de $num2 y $num1 da ".$num2-$num1."<br>";
                echo "La division entre $num2 y $num1 da ".$num2/$num1."<br>";
                echo "El modulo entre $num2 y $num1 da ".$num2%$num1."<br>";
                break;
            default:
                echo "La resta de $num1 y $num2 da ".$num1-$num2."<br>";
                echo "La division entre $num1 y $num2 da ".$num1/$num2."<br>";
                echo "El modulo entre $num1 y $num2 da ".$num1%$num1."<br>";
        }
    }
    echo "<br>";
    operaciones2($num1,$num2);

    function mayor($num1, $num2){
        if ($num1 > $num2){
            echo "El mayor es $num1";
        }elseif($num1 < $num2){
            echo "El mayor es $num2";
        }else{
            echo "Los dos son iguales";
        }
    }
    mayor($num1,$num2);
    echo "<br>";
    function esPar($num1){
        if($num1 == 0){
            echo "El numero es 0";
        }elseif($num1%2 == 0){
            echo "El numero es par";
        }else{
            echo "El numero es impar";
        }
    }
    esPar($num1);
    echo "<br>";

    $num1 = rand(0,100);
    $min = rand(0,100);
    $max = rand(0,100);

    function rango($num1,$min,$max){
       if ($min < $max){
            if(($num1 >= $min)&&($num1 <= $max)){
                $mita = $min+$max/2;
                if($num1 == $mita){
                    echo "$num1 es la mita";
                }else{
                    if($num1 < $mita){
                        if($num1 != $min){
                            echo "$num1 Esta en la mita inferior";
                        }else{
                            echo "$num1 Es el minimo";
                        }
                    }else{
                        if($num1 > $mita){
                            if($num1 != $max){
                                echo "$num1 Esta en el rango superior";
                            }else{
                                echo "$num1 Es el maximo";
                            }
                        }
                    }
                }
            }else{
                echo "No esta en el rango";
            }
       }else{
        echo "me cago";
       }
    }
    rango($num1,$min,$max);
    echo "<br>";

    $num1 = rand(0,100);
    $num2 = rand(0,100);
    function multiplo($num1,$num2){
        if ($num1 >= $num2){
            if ($num1%$num2 == 0){
                echo "$num1 es multiplo de $num2";
            }else{
                echo "$num1 no es multiplo de $num2";
            }
        }else{
            if ($num2%$num1 == 0){
                echo "$num2 es multiplo de $num1";
            }else{
                echo "$num2 no es multiplo de $num1";
            }
        }
    }
    $par = match(true){
        $num1 == 0 => "El numero es 0",
        $num1%2 == 0 => "El numero es par",
        default => "El numero es impar",
    };
    echo $par."<br>";
    $num1 = rand(0,10);
    $nota = match(true){
        (($num1 >= 0)&&($num1 < 5)) => "Suspenso",
        ($num1 <= 6) => "Aprobado",
        ($num1 <= 8) => "Notable",
        ($num1 <= 10) => "Genio",
    };
    echo $nota;
    echo "<br>";
    function calculadora($op, $x, $y){
        $res = match($op){
            "suma" => ($x+$y),
            "resta" => ($x-$y),
            "multiplicacion" => ($x*$y),
            "division" => ($x/$y)
        };
        return $res;
    }
    $op = rand(1,4);
    switch ($op){
        case 1:
            $op = "suma";
            break;
        case 2:
            $op = "resta";
            break;
        case 3:
            $op = "multiplicacion";
            break;
        case 4:
            $op = "division";
    }
    echo calculadora($op, rand(1,100),rand(1,100));
    echo "<br>";
    function comparador($num1,$num2,$num3){
        $res = match(true){
            ($num1 == $num2 && $num1 == $num3) => "Los tres son iguales",
            ($num1 == $num2 || $num1 == $num3 || $num2 == $num3) => "Solo dos son iguales",
            ($num1 != $num2 || $num1 != $num3 || $num2 != $num3) => "Ninguno es igual"
        };
        return $res;
    }
    echo comparador(1,2,0);
    echo "<br>";

    function login($user, $pass){
        $usuario1 = "admin";
        $contra1 = "123";
        if($user == "" || $pass == ""){
            return "faltan credenciales";
        }elseif($pass != $contra1 || $user != $usuario1){
            return "Contraseña o usuario incorrrecto";
        }else{
            return "Bienvenido admin";
        }
    }

    function tipar(int $num):string{
        return $num;
    }

    function calcularSuscripcion(string $plan, bool $estudiante, bool $anual):string{
        //planes: basic:25, pro:40, enterprise:60
        //descuento: estudiante:15%, anual%20
        $precio = 0;
        if($plan == "basic") $precio = 25;
        elseif($plan == "pro") $precio = 40;
        elseif($plan == "enterprise")$precio = 60;
        else return "No existe este plan <br>";

        if($estudiante) $precio -= $precio*15/100;
        if($anual) $precio -= $precio*20/100;
        
        $res = "Plan $plan - Total ".($precio)." euros ";
        if($estudiante) $res .= "Desc E ";
        if($anual) $res .= "Desc A <br>";
        return $res;
    }
    $plan = match(rand(1,3)){
        1 => "basic",
        2 => "pro",
        3 => "enterprise"
    };
    echo calcularSuscripcion($plan,rand(0,1),rand(0,1));
?>