<?php
    include 'conexion.php';
  session_start();
  if(isset($_SESSION["user"])){
  // y si no viene por index y no esta logado fuera

  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="c.css">
</head>
<body>
<div class="container-sm">
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="categorias.php">Categoria</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="historial.php">Historial</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="carrito.php">Carrito</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="finalizar.php?salir=1">Cerrar Sesion</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<h1>Carrito</h1>
<?php 
if(isset($_SESSION["carrito"])){
  $carrito=$_SESSION["carrito"];
?> 
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID PRODUCTO</th>
      <th scope="col">ID CATEGORIA</th>
      <th scope="col">DESCRIPCION</th>
      <th scope="col">CANTIDAD</th>
      <th scope="col">PRECIO</th>
      <th scope="col">TOTAL</th>
      <th scope="col">ACCION</th>
      <th scope="col">ACCION</th>
      <th scope="col">ACCION</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $total=0;
  foreach ($carrito as $key => $value) {

    $total+=($value->cantidad*$value->precio);
    
    echo "<tr><td>".$value->id_producto."</td><td>".$value->id_categoria."</td><td>".$value->descripcion."</td><td>".$value->cantidad."</td><td>".$value->precio."</td><td>".$value->cantidad*$value->precio."</td><td>"."<a href='addcarrito.php?lista=$key&operacion=delete'>eliminar producto</a>"."</td><td><a href='addcarrito.php?lista=$key&operacion=add'>+</a>"."</td><td>"."<a href='addcarrito.php?lista=$key&operacion=restar'>-</a>"."</td></tr>";
  }
  echo "<tr><td></td><td></td><td></td><td></td><td>TOTAL :</td><td>".$total."</td><td></td><td></td><td></td></tr></tbody></table>";

}else{if(isset($_GET['fin'])){
  echo '<h3>Compra Realizada</h3>';
}else{
    echo '<h3>Carrito Vacio</h3>';}
 }
  ?>
<a type="button" class="btn btn-primary" href="categorias.php">Volver Categorias</a>
<a type="button" class="btn btn-primary" href="finalizar.php?total=<?php echo $total; ?>">COMPRAR</a>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
    crossorigin="anonymous"></script>
</body>
</html>
<?php
 }else{ header('Location: index.php?error=2');}
?>