<?php
  session_start();
  if(isset($_SESSION["user"])){
    include 'conexion.php';
    $pedido=[];
    $user=$_SESSION["user"];
    $bfac="SELECT * FROM pedidos WHERE user='$user' ORDER BY i_pedido DESC";
    $result=$conn->query($bfac);
    if ($result->num_rows > 0){
    while($row = $result->fetch_assoc()) {
    $a=new fac($row["i_pedido"],$row["user"],$row["fecha"],$row["total"]);
    $pedido[]=$a;
    }}else{
      $a=new fac("No hay compras realizadas","","","");
      $pedido[]=$a;}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
      <th scope="col">Fecha</th>
      <th scope="col">Total</th>
      <th scope="col">Ver</th>
    </tr>
  </thead>
  <?php
  foreach ($pedido as $fac) {
      echo "<tr><td>".$fac->id_fac."</td><td>".$fac->date."</td><td>".$fac->total."</td><td><a href='lista.php?id=".$fac->id_fac."'>Ver</a></td></tr>";
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
  }else{
    header('Location: index.php?error=2');
  }
?>