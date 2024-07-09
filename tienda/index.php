<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>HTML</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
  <div class="container-sm">
<form action="login.php" method="post">
<?php if(isset($_GET['error'])){echo "<span>Nombre de usuario o Contraseña incorrecta</span>";} ?>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Usuarios</label>
    <input type="text" class="form-control"  <?php if(isset($_COOKIE['usuario'])){echo 'value="'.$_COOKIE['usuario'].'"';}?> name="user" id="exampleInputEmail1">
</div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control"  <?php if(isset($_COOKIE['password'])){echo 'value="'.$_COOKIE['password'].'"';}?> name="password" id="exampleInputPassword1">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" name="recordar" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Recordarme</label>
  </div>
  <button type="submit" class="btn btn-primary">Entrar</button>
  <div class="form-text"><a href="registrar.php">Registrate</a></div>
</form>
</div>
</body>
</html>