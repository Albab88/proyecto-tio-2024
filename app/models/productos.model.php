<?php
    require_once('model.php');

    class ProductosModel extends Model {

    public function getProductos(){
        $pdo = $this->crearConexion();
        $sql = "select * from productos order by nombre";
        $query = $pdo->prepare($sql);
        $query->execute();
    
        $productos = $query->fetchAll(PDO::FETCH_OBJ);
    
        return $productos;
    }

    public function getProdcutoById($id_producto){
        $pdo = $this->crearConexion();
        $sql = "SELECT * FROM productos WHERE id = ?";
        $query = $pdo->prepare($sql);
        $query->execute([$id_destino]);
        $producto = $query->fetch(PDO::FETCH_OBJ);
        return $producto;
    }
}