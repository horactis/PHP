<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors",1);
    require "conexion.php";
    ?>
</head>
<body>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $tmp_usuario = $_POST["usuario"];
            $tmp_contrasena = $_POST["contrasena"];

            if($tmp_usuario == ""){
                $err_usuario = "Introduce un usuario";
            }else{
                $usuario = $tmp_usuario;
            }

            if($tmp_contrasena == ""){
                $err_contrasena = "Introduce una contraseña";
            }else{
                $contrasena = $tmp_contrasena;
            }
            if(isset($usuario) && isset($contrasena)){
                $consulta = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
                $resultado = $_conexion->query($consulta);
                echo "<pre>";
                var_dump($resultado);
                echo "</pre>";

                if($resultado->num_rows === 0){
                    echo "<div class='alert alert-danger'>El usuario no existe en la base de datos</div>";
                }else{
                    $info_usuario = $resultado->fetch_assoc();

                    // echo "Contraseña ingresada: ". $contrasena;
                    // echo "<br>Hash almacenado: ".$info_usuario["contrasena"];
                    // echo "<pre>";
                    // var_dump(password_get_info($info_usuario["contrasena"]));
                    // echo "</pre>";
                    $verificacion_contrasena = password_verify($contrasena, $info_usuario["contrasena"]);

                    if(!$verificacion_contrasena){
                        echo "<div class='alert alert-danger'>La contraseña no coincide</div>";
                    }else{
                        /**
                         * qué hace session_start()
                         * 
                         * inicia una nueva sesión o recupera una antigua
                         * crea/lee una cookie llamada PHPSESSID en el navegador del usuario
                         * carga los datos de la sesión desde el servidor en el array $_SESSION
                         * 
                         * este session_start() lo usaremos al inicio de CADA página que necesite acceder a datos de la sesión
                         * llamaremos a la función antes de enviar cualquier salida HTML (antes del <!DOCTYPE>)
                         * 
                         * Qué es $_SESSION
                         * 
                         * un array asociativo que guarda datos en el servidor, es persistente entre diferentes ficheros mientras la sesión esté activa
                         */
                        session_start();
                        $_SESSION["usuario"] = $usuario;
                        $_SESSION["admin"] = $info_usuario["admin"];

                        header("location: ../index.php");
                        exit();
                        /**
                         * Qué es header
                         * 
                         * cuando tu navegador pide una página, el servidor responde con algo así HTTP/1.1 200 OK 
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
                        <label class="form-label">Usuario</label>
                        <input type="text" name="usuario" class="form-control">
                        <?php 
                            if(isset($err_usuario)) echo "<div class= 'alert alert-danger'>$err_usuario</div>";
                        ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Contraseña</label>
                        <input type="password" name="contrasena" class="form-control">
                        <?php 
                            if(isset($err_contrasena)) echo "<div class= 'alert alert-danger'>$err_contrasena</div>";
                        ?>
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Iniciar sesión" class="btn btn-primary w-100">
                    </div>
                </form>
                <h3 class="text-center mt-4 mb-3">Si no tienes cuenta, regístrate</h3>
                <a href="crearUser.php" class="btn btn-secondary w-100">Registrarse</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>