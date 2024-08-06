<?php
session_start();
if ($_SESSION['user_id']==""){
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <head>
  <script src="https://www.google.com/recaptcha/enterprise.js?render=6LeXLyAqAAAAABfz93jCxgW-qRc69Z4pGaJ9UuaE"></script>
  <!-- Your code -->
</head>
</head>
<body>
<?php include('captcha.php');
                 if(!empty($_GET['message'])) { 
                echo "<div class='alert alert-".$_GET['tipo']."' role='alert'>";
                echo '<b> '.$_GET['message'].'</b>';
                echo "</div>";
            } 
                 ?>
    <div class="container">
        <header class="text-center my-4">
            <h1>Inicio de Sesión</h1>
        </header>
        <form action="login.php" method="post">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="contrasena">Contraseña:</label>
                <input type="password" name="contrasena" id="contrasena" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
  function onClick(e) {
    e.preventDefault();
    grecaptcha.enterprise.ready(async () => {
      const token = await grecaptcha.enterprise.execute('6LeXLyAqAAAAABfz93jCxgW-qRc69Z4pGaJ9UuaE', {action: 'LOGIN'});
    });
  }
</script>
</body>
</html>

<?php exit;
}else{
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca del Jardín 914 Juana Manso de Berazategui</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .section-button {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100px;
            margin: 20px;
        }
        .section-button img {
            width: 50px;
            height: 50px;
        }
        .section-button span {
            margin-top: 10px;
        }
    </style>
</head>
<body>
<?php include('barra.php'); ?>
    <div class="container">
        <header class="text-center my-4">
            <h1>Biblioteca del Jardín 914 Juana Manso de Berazategui</h1>
            <p>Selecciona una temática para explorar</p>
        </header>
        <div class="row">
            <div class="col-md-4 text-center">
                <a href="biblioteca-docente.php" class="section-button btn btn-primary">
                    <img src="img/public-library.png" alt="Biblioteca Docente">
                    <span>Biblioteca Docente</span>
                </a>
            </div>
            <div class="col-md-4 text-center">
                <a href="material-pedagogico.php" class="section-button btn btn-primary">
                    <img src="img/libro.png" alt="Material Pedagógico">
                    <span>Material Pedagógico</span>
                </a>
            </div>
            <div class="col-md-4 text-center">
                <a href="multimedia.php" class="section-button btn btn-primary">
                    <img src="img/fotografia.png" alt="Multimedia">
                    <span>Multimedia</span>
                </a>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php } ?>