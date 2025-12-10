<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors",1);
    require "conexion.php"
    ?>
</head>
<body>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $tmp_email = $_POST["email"];
            $tmp_contraseña = $_POST["contraseña"];

            if($tmp_email == ""){
                $err_email = "Introduce un email";
            }else{
                $email = $tmp_email;
            }

            if($tmp_contraseña == ""){
                $err_contraseña = "Introduce una contraseña";
            }else{
                $contraseña = $tmp_contraseña;
            }
            if(isset($email) && isset($contraseña)){
                $consulta = "SELECT * FROM email WHERE email = '$email'";
                $resultado = $_conexion->query($consulta);
                echo "<pre>";
                var_dump($resultado);
                echo "</pre>";

                if($resultado->num_rows === 0){
                    echo "<div class='alert alert-danger'>El email no existe en la base de datos</div>";
                }else{
                    $info_email = $resultado->fetch_assoc();

                    //echo "Contraseña ingresada: ".$contraseña;
                    //echo "<br>Hash almacenado: ".$info_email["contraseña"];
                    //echo <pre>;
                    //var_dump($contraseña, $info_email["contraseña"]);
                    //echo </pre>;
                    $verificacion_contraseña = password_verify($contraseña, $info_email["contraseña"]);
                    
                    if(!$verificacion_contraseña){
                        echo "<div class='alert alert-danger'>La contraseña no coincide</div>";
                    }else{
                        /**
                         * que hace sesion_start()
                         * 
                         * inicia una nueva sesión o recupera una antigua
                         * crea/lee una cookie llamada PHPSESSID en el navegador del email
                         * carga los datos de la sesión desde el servidor en el array $_SESSION
                         * 
                         * este sesion_start() lo usaremos al inicio de cada pagina que necesite acceder a datos de la sesion
                         * Llamaremos a la funcion antes de enviar cualquier salida HTML (antes del <!DOCTYPE>)
                         * 
                         * Qué es $_SESSION
                         * 
                         * un array asociativo que guarda datos en el servidor, es persistente entre diferentes ficheros mientras la sesión esté activa
                         */
                        session_start();
                        $_SESSION["email"] = $email;
                        $_SESSION["admin"] = $info_email["admin"];
                        
                        header("location: ../index.php");
                        exit();
                        /**
                         * Que es header
                         * 
                         * cuando tu navegador pide una página, el servidor responde con algo asi HTTP/1.1 200 OK
                         * Content-type: text/html; charset=UTF-8.......
                         * <html></html> 
                         */
                        
                    }
                }
            }
        }
    ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <form action="" method="post">
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="text" name="email" class="form-control">
                        <?php if(isset($err_email)) echo "<div class='alert alert-danger'>$err_email</div>";?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Contraseña</label>
                        <input type="password" name="contraseña" class="form-control">
                        <?php if(isset($err_contraseña)) echo "<div class='alert alert-danger'>$err_contraseña</div>";?>
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Iniciar sesion" class="btn btn-primary w-100">
                    </div>
                </form>
                <h3 class="text-center mt-4 mb-3">Si no tienes cuenta, registrate</h3>
                <a href="crearUser.php" class="btn btn-secondary w-100">Registrarse</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>