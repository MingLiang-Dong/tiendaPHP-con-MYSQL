<?php
  session_start();
  if(isset($_SESSION["user"])){
    
    if(!isset($_GET['categoria'])){
        header('Location: categorias.php');
    }
    
    include 'conexion.php';
    $categoria=$_GET['categoria'];
    $productos=[];

    $bproductos="SELECT * FROM productos WHERE (id_categoria='$categoria')";
    $result=$conn->query($bproductos);
    if ($result->num_rows > 0){
    while($row = $result->fetch_assoc()) {
    $a=new Producto($row["id_producto"],$row["id_categoria"],$row["descripcion"],$row['precio'],$row["stock"],$row["imagen"]);
    $productos[]=$a;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>HTML</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
<table class="table">
  <thead>
    <tr>
      <th scope="col">IMAGEN</th>
      <th scope="col">ID_PRODUCTO</th>
      <th scope="col">DESCRIPCION</th>
      <th scope="col">PRECIO</th>
      <th scope="col">STOCK</th>
      <th scope="col">ACCION</th>
    </tr>
  </thead>
  <?php
  foreach ($productos as $producto) {
      echo "<tr><td class='imagen'><img  src='".$producto->imagen."'alt='".$producto->descripcion."'></td><td>".$producto->id_producto."</td><td>".$producto->descripcion."</td><td>".$producto->precio."</td><td>".$producto->stock."</td><td>"."<a href='addcarrito.php?idproducto=$producto->id_producto&descripcion=$producto->descripcion&categoria=$categoria&precio=$producto->precio&imagen=$producto->imagen'>ADD CARRITO</a>"."</td><tr>";
  }
  ?>
  </table>
  <a type="button" class="btn btn-primary" href="categorias.php">Volver</a>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
    crossorigin="anonymous"></script>
</body>
</html>
<?php
 }else{ header('Location: index.php?error=2');}
?>