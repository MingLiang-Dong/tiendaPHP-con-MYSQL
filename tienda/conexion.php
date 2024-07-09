<?php
    class Categoria{
        public $id_categoria;
        public $descripcion;
        public $imagen;
        function __construct($id_categoria,$descripcion,$imagen) {
          $this->id_categoria=$id_categoria;
          $this->descripcion=$descripcion;
          $this->imagen=$imagen;
        }
      }
    class Producto{
        public $id_producto;
        public $id_categoria;
        public $descripcion;
        public $precio;
        public $stock;
        public $imagen;
        function __construct($id_producto,$id_categoria,$descripcion,$precio,$stock,$imagen) {
          $this->id_producto=$id_producto;
          $this->id_categoria=$id_categoria;
          $this->descripcion=$descripcion;
          $this->precio=$precio;
          $this->stock=$stock;
          $this->imagen=$imagen;
    }}

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

    class fac{
      public $id_fac;
      public $user;
      public $date;
      public $total;
      function __construct($id_fac,$user,$date,$total) {
        $this->id_fac=$id_fac;
        $this->user=$user;
        $this->date=$date;
        $this->total=$total;
      }
    }

        $servername="localhost:3306";
        $database="tienda";
        $username="root";
        $password="";
        $conn=mysqli_connect( $servername,$username,$password,$database);
        if(!$conn){
            die("error conexion: ".mysqli_connect_error());
        }
?>