<?php  
class Item{
   public $id_producto;
   public $id_categoria;
   public $descripcion;
   public $precio;
   public $cantidad;
   function __construct($id_producto,$id_categoria,$descripcion,$precio,$cantidad) {
     $this->id_producto=$id_producto;
     $this->id_categoria=$id_categoria;
     $this->descripcion=$descripcion;
     $this->precio=$precio;
     $this->cantidad=$cantidad;
   }
 }
  session_start();
  if(isset($_SESSION["user"])){

 if(!isset($_SESSION["carrito"])){
    $carrito=[];
 }else{
    $carrito=$_SESSION["carrito"];
 }
 if(isset($_GET['lista'])){
  $id_producto=$_GET['lista'];
  $operacion=$_GET['operacion'];
  if ($operacion=='delete'){
    unset($carrito[$id_producto]);
  }
  if ($operacion=='add'){
    $carrito[$id_producto]->cantidad++;
  }
  if ($operacion=='restar'){
    if($carrito[$id_producto]->cantidad==1){
      unset($carrito[$id_producto]);
    }else{
      $carrito[$id_producto]->cantidad--;
    }
  }
  $_SESSION["carrito"]=$carrito; 
  if(count($carrito)<1){
    unset($_SESSION['carrito']);
  }
  header('Location: carrito.php' );
 }else{

 $id_producto=$_GET['idproducto'];
  $descripcion=$_GET['descripcion'];
  $categoria=$_GET['categoria'];
  $precio=$_GET['precio'];
 if(!isset($carrito[$id_producto])){
     $carrito[$id_producto]=new Item($id_producto,$categoria,$descripcion,$precio,1);
 }else{
  $carrito[$id_producto]->cantidad++;
 }
 $_SESSION["carrito"]=$carrito;
 header('Location: productos.php?categoria='.$categoria );}
}else{ header('Location: index.php?error=2');}
 ?>