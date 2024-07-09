<?php
  session_start();
  if(isset($_SESSION["admin"])){

    if(isset($_GET['tipo'])){
        include '../conexion.php';
        switch ($_GET['tipo']) {
            case 'a':
                if(($_POST['imagen']=="")||($_POST['descripcion']=="")){
                    header('Location: acategoria.php?error=2');
                }else{
                $descripcion=$_POST['descripcion'];
                $imagen=$_POST['imagen'];
                $insert="INSERT INTO categorias (descripcion, imagen) VALUES ('$descripcion','$imagen')";
                if (mysqli_query($conn, $insert)) {
                  header('Location: acategoria.php?error=1');
                } else {
                  header('Location: acategoria.php?error=2');
                }
                }
                break;
            case 'm':
                if((!isset($_GET['id_categoria']))||($_POST['descripcion']=="")||($_POST['imagen']=="")){
                    header('Location: concategoria.php?error=2');
                }else{
                $id_categoria=$_GET['id_categoria'];
                $descripcion=$_POST['descripcion'];
                $imagen=$_POST['imagen'];
                $insert="UPDATE categorias  SET descripcion ='$descripcion',imagen='$imagen' WHERE id_categoria = '$id_categoria'";
                if (mysqli_query($conn, $insert)) {
                  header('Location: concategoria.php?error=1');
                } else {
                  header('Location: concategoria.php?error=2');
                }
                }
                break;
            case 'e':
                if(($_POST['id_categoria']=="")){
                  header('Location: ecategoria.php?error=2');
                }else{
                $id_categoria=$_POST['id_categoria'];
                $insert="DELETE FROM categorias WHERE id_categoria=$id_categoria;";
                if (mysqli_query($conn, $insert)) {
                  header('Location: ecategoria.php?error=1');
                } else {
                  header('Location: ecategoria.php?error=2');
                }
                }
                break;
            case 'c':
                if($_POST["id_categoria"]==""){
                   header('Location: concategoria.php?error=2');
                  }else{
                  $a=$_POST["id_categoria"];
                  header("Location: concategoria.php?con=$a");
                  }
                    break;
          
        }
    }

  }else{
    header('Location: index.php?error=2');
  }
?>