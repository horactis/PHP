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
        $admin = isset($_POST["admin"]) ? 1 : 0;//es como un if else pero en una linea, si existe admin sale 1 y si no sale 0
        $tmp_nombre = $_POST["nombre"];
        $tmp_apellido = $_POST["apellido"];
        $tmp_telefono = $_POST["telefono"];
        $direccion = $_POST["direccion"];
        $tmp_postal = $_POST["codigo_postal"];
        $ciudad = $_POST["ciudad"];

        //Validacion de nombre
        $tmp_nombre = htmlspecialchars($tmp_nombre);
        $tmp_nombre = trim($tmp_nombre);
        $tmp_nombre = preg_replace("/\s+/","_", $tmp_nombre);

        if($tmp_nombre == ""){
            $err_nombre = "Inserta un nombre";
        }elseif(strlen($tmp_nombre)<3){
            $err_nombre = "El nombre debe tener al menos 3 caracteres";
        }else{
            $nombre = $tmp_nombre;
        }
        //Validacion de apellido
        $tmp_apellido = htmlspecialchars($tmp_apellido);
        $tmp_apellido = trim($tmp_apellido);

        if($tmp_apellido == ""){
            $err_apellido = "Inserta un apellido";
        }elseif(strlen($tmp_apellido)<3){
            $err_apellido = "El apellido debe tener al menos 3 caracteres";
        }else{
            $apellido = $tmp_apellido;
        }
        //Validacion de email
        $tmp_email = htmlspecialchars($tmp_email);
        $tmp_email = trim($tmp_email);

        if($tmp_email == ""){
            $err_email = "Inserta un email";
        }elseif(strlen($tmp_email)<3){
            $err_email = "El email debe tener al menos 3 caracteres";
        }else{
            if(filter_var($tmp_email,FILTER_VALIDATE_EMAIL)){
                $email = $tmp_email;
            }else{
                $err_email = "<span class='error'>El valor ingresado no es un correo valido</span>";
            }
        }
        //Validacion de telefono
        $tmp_telefono = htmlspecialchars($tmp_telefono);
        $tmp_telefono = trim($tmp_telefono);
        $tmp_telefono = preg_replace("/\s+/","_", $tmp_telefono);
        if(preg_match("/^[6-8][0-9]{8}$/", $tmp_telefono)){
            $telefono = $tmp_telefono;
        }else{
            $err_telefono = "El teléfono debe comenzar por 6, 7 u 8 y tener 9 dígitos.";
        }
        //Validacion de codigo postal
        $tmp_postal = htmlspecialchars($tmp_postal);
        $tmp_postal = trim($tmp_postal);
        $tmp_postal = preg_replace("/\s+/","_", $tmp_postal);
        if (preg_match("/^[0-9]{5}$/", $tmp_postal)) {
            $postal = $tmp_postal;
        }else{
            $err_postal = "El código postal debe tener exactamente 5 dígitos.";
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

        if(isset($contraseña) && (isset($email)) && (isset($nombre)) && (isset($apellido)) && (isset($telefono)) && (isset($direccion)) && (isset($postal)) && (isset($ciudad))){
            $contraseña_cifrada = password_hash($contraseña, PASSWORD_DEFAULT);
            $consulta = "INSERT INTO usuarios (nombre, apellidos, email, contrasena, telefono, direccion, codigo_postal, ciudad, admin) VALUES ('$nombre', '$apellido','$email', '$contraseña_cifrada', '$telefono', '$direccion', '$postal', '$ciudad','$admin')";
            if($_conexion->query($consulta)){
                echo "<div class='alert alert-success'>Email registrado correctamente</div>";
            }else{
                echo "<div class='alert alert-danger'>No se ha podido registrar el email $_conexion->error</div>";
            }
        }
    }
    ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <form action="" method="post">
                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" name="nombre" class="form-control">
                        <?php if(isset($err_nombre)) echo "<div class='alert alert-danger'>$err_nombre</div>";?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Apellido</label>
                        <input type="text" name="apellido" class="form-control">
                        <?php if(isset($err_apellido)) echo "<div class='alert alert-danger'>$err_apellido</div>";?>
                    </div>
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
                        <label class="form-label">Telefono</label>
                        <input type="text" name="telefono" class="form-control">
                        <?php if(isset($err_telefono)) echo "<div class='alert alert-danger'>$err_telefono</div>";?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Direccion</label>
                        <input type="text" name="direccion" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Codigo postal</label>
                        <input type="text" name="codigo_postal" class="form-control">
                        <?php if(isset($err_postal)) echo "<div class='alert alert-danger'>$err_postal</div>";?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ciudad</label>
                        <input type="text" name="ciudad" class="form-control">
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