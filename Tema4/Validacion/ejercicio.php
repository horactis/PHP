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
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["ej1"])){
        $tmp_comentario = $_POST["comentario"];
        if($tmp_comentario == ""){
            $err_comentario =  "Introduce algun comentario";
        }else{
            $comentario_sanitizado = htmlspecialchars($tmp_comentario);
            $comentario_sanitizado = trim($comentario_sanitizado); //Quitar espacios a los lados
            if(strlen($comentario_sanitizado)<5 || strlen($comentario_sanitizado) > 70){
                $err_comentario =  "el comentario tiene menos de 5 o mas de 70 caracteres";
                
            }else{
                $resultado =  "<div style = 'background-color:green;color:white;'>Comentario original: $tmp_comentario<br>Comentario sanitizado: $comentario_sanitizado<br>Numero de caracteres: ".strlen($tmp_comentario)."</div>";
            }
        }
    }
    ?>
    <h1>Ejercicio 1</h1>
    <form action="" method="post">
        <label for="comentario">comentario:</label><br>
        <input style="width: 350px;height: 100px;" type="text" name="comentario" placeholder="Ej: <script>alert('xss')</script> o <b>Texto en negrita</b>">
        <br>
        <?php if(isset($err_comentario)) echo $err_comentario."<br>"; ?>
        <input type="submit" value="Enviar" name="ej1">
        <?php if(isset($resultado)) echo $resultado; ?>
    </form>
    <?php
    /**
     * /patron/ : es el patron de la expresion regular
     * 
     * Patrones comunes
     * 
     * \d : Un digito (0-9)
     * \w : Un carácter alfanumerico (letras y números y guíon bajo)
     * \s : Un espacio en blanco
     * . : Cualquier carácter exceptuando el salto de linea
     * + : Uno o más de la expresion anterior(Ej: si tengo \d+ entonces mi patron será uno o mas digitos)
     * * : Cero o más de la expresion anterior
     * ^ : Comienza con
     * $ : Termina con
     * 
     * [] : Define un conjunto de caracteres que puede coincidir con cualquiera de los caracteres que están dentro del conjunto (Ej: [$%&!?])
     * {8} : Se repetira el patron anterior 8 veces
     * {8,10} : Se repetira de 8 a 10 veces
     * {8,} : Se repetira 8 o más veces
     * {,8} : Se repetira 8 o menos veces
     * 
     * (?=.*) : Es una expresion de busqueda anticipada positiva que verifica que la condicion dentro de los parentesis este presente en algun lugar de la cadena
     */
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["ej2"])){
        $tmp_dni = $_POST["dni"];
        $tmp_dniO = "";
        if($tmp_dni == ""){
            $err_dni = "No has introducido nada, introduce un DNI";
        }else{
            $tmp_dni = strtoupper($tmp_dni);
            $tmp_dni = (preg_replace("/\s+/" ,"",$tmp_dni));
            if(preg_match("/^\d{8}[A-Z]$/", $tmp_dni)){
                $tmp_dniO = $tmp_dni;
                $tmp_dni = (preg_replace("/[A-Z]/" ,"",$tmp_dni));
                $letra = "TRWAGMYFPDXBNJZSQVHLCKE";
                $num = $tmp_dni%23;
                $tmp_dni .= $letra[$num];
                if(strlen($tmp_dniO[8] == $letra[$num])){
                    $dni = $tmp_dni;
                }else
                    $err_dni = "Letra incorrecta";
            }else{
                $err_dni = "Introduce un DNI valido";
            }
        }
    }
    ?>
    <br>
    <h1>Ejercicio 2</h1>
    <form action="" method="post">
        <label for="dni">Introduce tu DNI: </label>
        <input type="text" name="dni">
        <?php if(isset($err_dni)) echo $err_dni."<br>";?>
        <input type="submit" value="Enviar" name="ej2">
        <?php if(isset($dni)) echo $dni." Letra correcta";?>
    </form>


    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["ej3"])){
        $tmp_email = $_POST["email"];
        $tmp_url = $_POST["url"];
        $tmp_email = trim($tmp_email);
        $tmp_url = trim($tmp_url);
        if(filter_var($tmp_email,FILTER_VALIDATE_EMAIL)){
            $email_sanitizado = filter_var($tmp_email, FILTER_SANITIZE_EMAIL);
            $email = "<span class='success'>El valor ingresado es un correo valido</span>";
        }else{
            $err_email = "<span class='error'>El valor ingresado no es un correo valido</span>";
        }
        //Validacion de URL
        if(filter_var($tmp_url,FILTER_VALIDATE_URL)){
            $url = "<span class='success'>El valor ingresado es una URL valido</span>";
        }else{
            $err_url = "<span class='error'>El valor ingresado no es una URL valido</span>";
        }
    }
    ?>
    <br>
    <h1>Ejercicio 3</h1>
    <form action="" method="post">
        <label for="email">Email: </label>
        <input type="text" name="email"><br>
        <label for="url">URL: </label>
        <input type="text" name="url">
        <br>
        <input type="submit" value="Enviar" name="ej3"><br>
        <?php if(isset($err_email)) echo $err_email;?>
        <?php if(isset($err_url)) echo $err_url;?>
        <?php 
        if(isset($email_sanitizado, $url)){
            echo "Email valido: $email<br>Email sanitizado: $email_sanitizado<br>URL valido: $url";    
        }?>
        
    </form>
</body>
</html>