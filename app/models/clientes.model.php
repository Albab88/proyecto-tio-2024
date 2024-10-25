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
        $query->execute([$id_cliente]);
        $cliente = $query->fetch(PDO::FETCH_OBJ);
        return $cliente;
    }

    public function insertarReserva($nombre, $animal, $fecha, $hora){
        $pdo = $this->crearConexion();
        
        $sql = 'INSERT INTO turnos (nombre,mascota,fecha,hora) 
                VALUES (?,?,?,?)';

        $query = $pdo->prepare($sql);
        try {
            $query->execute([$nombre, $animal, $fecha, $hora]);
        } catch (\Throwable $th) {
            return null;
        }
    }

    public function getTurnos(){
        $pdo = $this->crearConexion();
        $sql = "select * from turnos order by fecha,hora";
        $query = $pdo->prepare($sql);
        $query->execute();
    
        $turnos = $query->fetchAll(PDO::FETCH_OBJ);
    
        return $turnos;
    }
}