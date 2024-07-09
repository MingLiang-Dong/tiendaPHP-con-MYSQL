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
<form action="modcategoria.php?tipo=c" method="post">
  <div class="mb-3">
  <label for="exampleInputEmail1" class="form-label">id_categoria</label>
  <select class="form-select" name="id_categoria" aria-label="Default select example">
    <option value="" selected>Open this select menu</option>
    <?php 
     include '../conexion.php';
    $bcategoria="SELECT * FROM categorias";
    $result=$conn->query($bcategoria);
    if ($result->num_rows > 0){
    while($row = $result->fetch_assoc()) {
    echo '<option value="'.$row["id_categoria"].'">'.$row["id_categoria"].'_'.$row["descripcion"].'</option>';
    }}
    ?>
  </select>
</div>
  <button type="submit" class="btn btn-primary">Consultar</button>
  <a href="../administrador.php" type="submit" class="btn btn-primary">Volver</a>
</form>
<?php 
if(isset($_GET['con'])){
 
    $id_categoria=$_GET['con'];
    $bproductos="SELECT * FROM categorias WHERE (id_categoria='$id_categoria')";
    $result=$conn->query($bproductos);
    if ($result->num_rows > 0){

    while($row = $result->fetch_assoc()) {
      
    echo '<hr><form action="modcategoria.php?tipo=m&id_categoria='.$_GET['con'].'" method="post">
    <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Descripcion</label>
    <input type="text" value="'.$row['descripcion'].'" class="form-control" name="descripcion" id="exampleInputPassword1">
    </div>
    <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Url Imagen</label>
    <input type="text" value="'.$row['imagen'].'" class="form-control" name="imagen" id="exampleInputPassword1">
    </div>
    <button type="submit" class="btn btn-primary">Modificar</button></form>';
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
?>
</div>
</body>
</html>
<?php
  }else{
    header('Location: index.php?error=2');
  }
?>