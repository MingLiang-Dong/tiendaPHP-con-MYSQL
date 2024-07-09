<?php
  session_start();
  if(isset($_SESSION["admin"])){
    include '../conexion.php';

    $productos=[];

    $bproductos="SELECT * FROM productos WHERE (stock<10)";
    $result=$conn->query($bproductos);
    if ($result->num_rows > 0){
    while($row = $result->fetch_assoc()) {
    $a=new Producto($row["id_producto"],$row["id_categoria"],$row["descripcion"],$row['precio'],$row["stock"],$row["imagen"]);
    $productos[]=$a;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../c.css">
</head>
<body>
<div class="container-sm">
  
<table class="table">
  <thead>
    <tr>
      <th scope="col">IMAGEN</th>
      <th scope="col">ID PRODUCTO</th>
      <th scope="col">DESCRIPCION</th>
      <th scope="col">PRECIO</th>
      <th scope="col">STOCK</th>
    </tr>
  </thead>
  <?php
  foreach ($productos as $producto) {
      echo "<tr><td class='imagen'><img  src='".$producto->imagen."'alt='".$producto->descripcion."'></td><td>".$producto->id_producto."</td><td>".$producto->descripcion."</td><td>".$producto->precio."</td><td>".$producto->stock."</td><tr>";
  }
  ?>
  </table>
  <a href="../administrador.php" type="submit" class="btn btn-primary">Volver</a>
</div>
</body>
</html>
<?php
  }else{
    header('Location: index.php?error=2');
  }
?>