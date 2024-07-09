<?php

include 'conexion.php';
  session_start();
  if(isset($_SESSION["user"])){
    if(isset($_GET['salir'])){
    session_destroy();
    header('Location: index.php');
    }else{
      if($_GET['total']==0){
        header('Location: carrito.php');
      }else{
        $carrito=$_SESSION["carrito"];
        /*
        $array=[];
        foreach ($carrito as $key => $value) {
          $id_producto= $value->id_producto;
          $cantidad=$value->cantidad;
          $vcan="SELECT * FROM productos WHERE id_producto='$id_producto' LIMIT 1 ";
          $result=$conn->query($vcan);
          if ($result->num_rows > 0){
          $row = $result->fetch_assoc();
          if($row['stock']<$cantidad){
            $array[$id_producto]=$row['descripcion'];
          }
          }
        }
        if($array.length()<1){*/
        $user=$_SESSION["user"];
        $total=$_GET['total'];
      $insert="INSERT INTO pedidos (user, total) VALUES ('$user','$total')";
      mysqli_query($conn, $insert);

      $pedido="SELECT * FROM pedidos WHERE user='$user' ORDER BY i_pedido DESC LIMIT 1 ";
      $result=$conn->query($pedido);
      if ($result->num_rows > 0){
      $row = $result->fetch_assoc();
      $i_pedido=$row["i_pedido"];
      }
      
      foreach ($carrito as $key => $value) {
        $id_producto= $value->id_producto;
        $descripcion= $value->descripcion;
        $precio=$value->precio;
        $cantidad=$value->cantidad;
        
      $lista="INSERT INTO los_pedidos (i_pedido,user,id_producto,descripcion,cantidad,precio) VALUES ('$i_pedido','$user','$id_producto','$descripcion','$cantidad','$precio')";
      mysqli_query($conn, $lista);


        $bproductos="SELECT stock FROM productos WHERE id_producto='$id_producto'";
        $result=$conn->query($bproductos);
        if ($result->num_rows > 0){
          $row = $result->fetch_assoc();
          $nuevo=$row["stock"]-($value->cantidad);
        }
        $up="UPDATE productos SET stock ='$nuevo' WHERE id_producto = '$id_producto'";
        mysqli_query($conn, $up);

      }
      unset($_SESSION['carrito']);
     // }
      header('Location: carrito.php?fin=1');}
    }
}else{ header('Location: index.php?error=2');}
?>