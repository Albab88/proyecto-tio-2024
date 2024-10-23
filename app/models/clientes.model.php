<?php
    require_once('model.php');

    class ClientesModel extends Model {

    public function getClientes(){
        $pdo = $this->crearConexion();
        $sql = "select * from clientes order by nombre";
        $query = $pdo->prepare($sql);
        $query->execute();
    
        $clientes = $query->fetchAll(PDO::FETCH_OBJ);
    
        return $clientes;
    }

    public function getClienteById($id_cliente){
        $pdo = $this->crearConexion();
        $sql = "SELECT * FROM clientes WHERE id = ?";
        $query = $pdo->prepare($sql);
        $query->execute([$id_destino]);
        $cliente = $query->fetch(PDO::FETCH_OBJ);
        return $cliente;
    }
}