<?php
  session_start();
  if(isset($_SESSION["user"])){
    include 'conexion.php';

    $id=$_GET['id'];
    $lista=[];

    $blista="SELECT * FROM los_pedidos WHERE i_pedido='$id'";
    $result=$conn->query($blista);
    if ($result->num_rows > 0){
    while($row = $result->fetch_assoc()) {
    $a=new Item($row["id_producto"],$row["i_pedido"],$row["descripcion"],$row["precio"],$row["cantidad"]);
    $lista[]=$a;
    }}
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
            <th scope="col">Numero de Pedido</th>
            <th scope="col">ID Producto</th>
            <th scope="col">DESCRIPCION</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Precio</th>
            <th scope="col">Precio Total</th>
            </tr>
        </thead>
  <?php
    $total=0;
    foreach ($lista as $key => $value) {
  
      $total+=($value->cantidad*$value->precio);
      
      echo "<tr><td>".$value->id_categoria."</td><td>".$value->id_producto."</td><td>".$value->descripcion."</td><td>".$value->cantidad."</td><td>".$value->precio."</td><td>".$value->cantidad*$value->precio."</td></tr>";
    }
    echo "<tr><td></td><td></td><td></td><td></td><td>TOTAL:</td><td>".$total."</td><td></td><td></td><td></td></tr>";
    echo '</table>';
   ?>
   <a type="button" class="btn btn-primary" href="historial.php">Volver</a>
   <a type="button" class="btn btn-primary" href="categorias.php">Categorias</a>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
    crossorigin="anonymous"></script>
</body>
</html>
<?php
}else{ header('Location: index.php?error=2');}
?>