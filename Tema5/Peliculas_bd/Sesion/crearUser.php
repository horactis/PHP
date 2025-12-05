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
        $tmp_usuario = $_POST["usuario"];
        $tmp_contraseña = $_POST["contraseña"];
        $admin = isset($_POST["admin"]) ? 1 : 0;//es como un if else pero en una linea, si existe admin sale 1 y si no sale 0
        
        //Validacion de usuario
        $tmp_usuario = htmlspecialchars($tmp_usuario);
        $tmp_usuario = trim($tmp_usuario);
        $tmp_usuario = preg_replace("/\s+/","_", $tmp_usuario);

        if($tmp_usuario == ""){
            $err_usuario = "Inserta un usuario";
        }elseif(strlen($tmp_usuario)<3){
            $err_usuario = "El usuario debe tener al menos 3 caracteres";
        }else{
            $usuario = $tmp_usuario;
        }
        //Validacion de contraseña
        $tmp_contraseña = htmlspecialchars($tmp_contraseña);
        $tmp_contraseña = trim($tmp_contraseña);

        if($tmp_contraseña == ""){
            $err_contraseña = "Inserta una contraseña";
        }elseif(strlen($tmp_contraseña)<3){
            $err_contraseña = "La contraseña tiene que tener al menos 3 caracteres";
        }else{
            $contraseña = $tmp_contraseña;
        }

        if(isset($contraseña) && (isset($usuario))){
            $contraseña_cifrada = password_hash($contraseña, PASSWORD_DEFAULT);
            $consulta = "INSERT INTO usuarios (usuario, contrasena, admin) VALUES ('$usuario', '$contraseña_cifrada', '$admin')";
            if($_conexion->query($consulta)){
                echo "<div class='alert alert-success'>Usiario registrado correctamente</div>";
            }else{
                echo "<div class='alert alert-danger'>No se ha podido registrar el usuario</div>";
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
                        <?php if(isset($err_usuario)) echo "<div class='alert alert-danger'>$err_usuario</div>";?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Contraseña</label>
                        <input type="password" name="contraseña" class="form-control">
                        <?php if(isset($err_contraseña)) echo "<div class='alert alert-danger'>$err_contraseña</div>";?>
                    </div>
                    <div class="mb-3">
                        <input type="checkbox" name="admin" class="form-check-input">
                        <label class="form-check-label">¿Eres admin?</label>
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Registrarse" class="btn btn-primary w-100">
                    </div>
                </form>
                <h3 class="text-center mt-4 mb-3">Si ya tienes cuenta, inicia sesión</h3>
                <a href="login.php" class="btn btn-secondary w-100">Iniciar sesión</a>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>