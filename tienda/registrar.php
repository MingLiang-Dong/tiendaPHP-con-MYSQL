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
<form action="login.php?registrar=1" method="post">
  <?php if(isset($_GET['error'])){echo "<span>Nombre de usuario repetido</span>";} ?>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Usuarios</label>
    <input type="text" class="form-control"  name="user" id="exampleInputEmail1">
</div> 
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input type="email" class="form-control"  name="email" id="exampleInputEmail1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control"  name="password" id="exampleInputPassword1">
  </div>
  <button type="submit" class="btn btn-primary">Registrarme</button>
  <a type="button" class="btn btn-primary" href="index.php">Login</a>
</form>
</div>
</body>
</html>