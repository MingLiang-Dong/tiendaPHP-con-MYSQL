<?php
  session_start();
  if(isset($_SESSION["admin"])){
    if(isset($_GET['tipo'])){
      include '../conexion.php';
      switch ($_GET['tipo']) {
          case 'a':
              if(($_POST['id_producto']=="")||($_POST['id_categoria']=="")||($_POST['descripcion']=="")||($_POST['cantidad']=="")||($_POST['precio']=="")){
                  header('Location: aproducto.php?error=2');
              }else{
              $id_producto=$_POST['id_producto'];
              $id_categoria=$_POST['id_categoria'];
              $descripcion=$_POST['descripcion'];
              $cantidad=$_POST['cantidad'];
              $precio=$_POST['precio'];
              $imagen=$_POST['imagen'];
              $insert="INSERT INTO productos  VALUES ('$id_producto','$id_categoria','$descripcion','$cantidad','$precio','$imagen')";
              
              if (mysqli_query($conn, $insert)) {
                header('Location: aproducto.php?error=1');
              } else {
                header('Location: aproducto.php?error=2');
              }
              }
              break;
          case 'm':
              if((!isset($_GET['id_producto']))||($_POST['id_categoria']=="")||($_POST['descripcion']=="")||($_POST['imagen']=="")||($_POST['cantidad']=="")||($_POST['precio']=="")){
                  header('Location: conproducto.php?error=2');
              }else{
                $id_producto=$_GET['id_producto'];
                $id_categoria=$_POST['id_categoria'];
                $descripcion=$_POST['descripcion'];
                $imagen=$_POST['imagen'];
                $cantidad=$_POST['cantidad'];
                $precio=$_POST['precio'];

              $insert="UPDATE productos  SET  id_categoria='$id_categoria', descripcion='$descripcion',stock='$cantidad',precio='$precio', imagen='$imagen' WHERE id_producto = '$id_producto'";
              if (mysqli_query($conn, $insert)) {
                header('Location: conproducto.php?error=1');
              } else {
                header('Location: conproducto.php?error=2');
              }
              }
              break;
          case 'e':
              if(($_POST['id_producto']=="")){
                header('Location: eproducto.php?error=2');
              }else{
              $id_producto=$_POST['id_producto'];
              $insert="DELETE FROM productos WHERE $id_producto;";
              if (mysqli_query($conn, $insert)) {
                header('Location: eproducto.php?error=1');
              } else {
                header('Location: eproducto.php?error=2');
              }
              }
              break;
          case 'c':
            if($_POST["id_producto"]==""){
              header('Location: conproducto.php?error=2');
            }else{
            $a=$_POST["id_producto"];
            header("Location: conproducto.php?con=$a");
            }
              break;
      }
  }
  }else{
    header('Location: index.php?error=2');
  }
?>