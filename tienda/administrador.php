<?php
/*
<?php
  session_start();
  if(isset($_SESSION["admin"])){
?>

<?php
  }else{
    header('Location: index.php?error=2');
  }
?>
  */
  session_start();
  if(isset($_SESSION["admin"])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
      .d-grid{
        margin-top: 1rem;
      }
    </style>
  </head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="finalizar.php?salir=1">Cerrar Sesion</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="d-grid gap-2 col-6 mx-auto">
  <a href="./admin/avisos.php" class="btn btn-primary" type="button">Avisos</a>
  <a href="./admin/concategoria.php" class="btn btn-primary" type="button">Consultar y Modificar Categoria</a>
  <a href="./admin/conproducto.php" class="btn btn-primary" type="button">Consultar y Modificar Productos</a>
  <a href="./admin/acategoria.php" class="btn btn-primary" type="button">Añadir Categoria</a>
  <a href="./admin/aproducto.php" class="btn btn-primary" type="button">Añadir Productos</a>  
  <a href="./admin/ecategoria.php" class="btn btn-primary" type="button">Quitar Categoria</a>
  <a href="./admin/eproducto.php" class="btn btn-primary" type="button">Quitar Productos</a>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
    crossorigin="anonymous"></script>
</body>
</html>
<?php
  }else{
    header('Location: index.php?error=2');
  }
?>