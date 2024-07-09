<?php
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

</head>
<body>
<div class="container-sm">
<form action="modproductos.php?tipo=c" method="post">
  <div class="mb-3">
  <label for="exampleInputEmail1" class="form-label">id_producto</label>
  <select class="form-select" name="id_producto" aria-label="Default select example">
    <option value="" selected>Open this select menu</option>
    <?php 
     include '../conexion.php';
    $bcategoria="SELECT * FROM productos";
    $result=$conn->query($bcategoria);
    if ($result->num_rows > 0){
    while($row = $result->fetch_assoc()) {
    echo '<option value="'.$row["id_producto"].'">'.$row["id_producto"].'_'.$row["descripcion"].'</option>';
    }}
    ?>
  </select>
</div>
  <button type="submit" class="btn btn-primary">Consultar</button>
  <a href="../administrador.php" type="submit" class="btn btn-primary">Volver</a>
</form>
<?php 
if(isset($_GET['con'])){

    $id_producto=$_GET['con'];
    $bproductos="SELECT * FROM productos WHERE (id_producto='$id_producto')";
    $result=$conn->query($bproductos);
    if ($result->num_rows > 0){

    while($row = $result->fetch_assoc()) {
      echo '<hr><form action="modproductos.php?tipo=m&id_producto='.$_GET['con'].'" method="post">  
      <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">ID Categoria</label>
      <select class="form-select" name="id_categoria" aria-label="Default select example">
    <option value="'.$row['id_categoria'].'" selected>'.$row['id_categoria'].'</option>';

    $bcategoria="SELECT * FROM categorias";
    $result=$conn->query($bcategoria);
    if ($result->num_rows > 0){
    while($rowt = $result->fetch_assoc()) {
    echo '<option value="'.$rowt["id_categoria"].'">'.$rowt["id_categoria"].'_'.$rowt["descripcion"].'</option>';
    }}

    echo '</select>
    </div>
      <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Descripcion</label>
      <input type="text" class="form-control" value="'.$row['descripcion'].'" name="descripcion" id="exampleInputPassword1">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Cantidad</label>
      <input type="text" class="form-control" value="'.$row['stock'].'" name="cantidad" id="exampleInputPassword1">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Precio</label>
      <input type="text" class="form-control" value="'.$row['precio'].'" name="precio" id="exampleInputPassword1">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Url Imagen</label>
      <input type="text" class="form-control" value="'.$row['imagen'].'" name="imagen" id="exampleInputPassword1">
    </div>
    <button type="submit" class="btn btn-primary">Modificar</button>
    </form>';
    }
  }
}
if(isset($_GET['error'])){
  switch ($_GET['error']) {
    case 2:
      echo 'Intentalo de nuevo';
      break;
    case 1:
      echo 'Listo';
      break;
    }
}
?></div>
</body>
</html>
<?php
  }else{
    header('Location: index.php?error=2');
  }
?>