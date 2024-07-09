<?php
  if(($_POST['user']=="")&&($_POST['password']=="")){
    if(isset($_GET['registrar'])){
      header('Location: registrar.php?error=0');
    }else{
        header('Location: index.php?error=0');
      }
  }else{
    session_start();
    include 'conexion.php';
    $user=$_POST['user'];
    $password=$_POST['password'];
    
    $usuario="SELECT * FROM usuarios WHERE user='$user'";
    $result=$conn->query($usuario);

    if(mysqli_num_rows($result)>0){

      if(isset($_GET['registrar'])){
        header("Location: registrar.php?error=1");
      }else{
      $row = $result->fetch_assoc();
      $bpass = $row["password"];
      if($bpass==$password){
        $_SESSION["user"]=$user;

        if($_POST['recordar']){
          setcookie('usuario',$user);
          setcookie('password',$password);
        }
        $broll = $row["rol"];
        if($broll=="admin"){
            $_SESSION["admin"]="admin";
            header('Location: administrador.php');
        }else {
            header('Location: categorias.php');
        }
      }else{
        header('Location: index.php?error=1');
      }}
    }else{
      if(isset($_GET['registrar'])){
        if($_POST['email']==""){
          header('Location: registrar.php?error=0');
        }else{
          $email=$_POST['email'];
        }
        $sql = "INSERT INTO usuarios (user, password ,rol, email) VALUES ('$user', '$password','user','$email')";
        if (mysqli_query($conn, $sql)) {
          $_SESSION["user"]=$user;
          header("Location: categorias.php?bienvenido='$user'");
        } else {
          header('Location: registrar.php?error=1');
        }
      }else{
        header('Location: index.php?error=1');}
    }
  }
?>
