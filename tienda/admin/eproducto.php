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
<form action="modproducto.php?tipo=e" method="post">
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
  <button type="submit" class="btn btn-primary">Eliminar</button>
  <a href="../administrador.php" type="submit" class="btn btn-primary">Volver</a>
</form>
<?php 
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