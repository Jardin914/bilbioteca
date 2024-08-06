<?php 
session_start();
if($_SESSION['user_rol']=="admin"){ ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Administración de Biblioteca - Jardín 914</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="usuarios.php">Administrar Usuarios</a>
                </li>
              
                 <li class="nav-item">
                    <a class="nav-link" href="formulario.php">Administrar Documentos</a>
                </li>
                 <li class="nav-item active">
                    <a class="nav-link" href="logout.php">Salir <span class="sr-only">(current)</span></a>
                </li> 
            </ul>
        </div>
    </nav>
<?php } 
if($_SESSION['user_rol']=="usuario"){  ?>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Administración de Biblioteca - Jardín 914</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
                </li> 
                <li class="nav-item active">
                    <a class="nav-link" href="logout.php">Salir <span class="sr-only">(current)</span></a>
                </li> 
              </ul>
        </div>
    </nav>  
 <?php }    ?>