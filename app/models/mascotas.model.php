<?php
    require_once('model.php');

    class MascotasModel extends Model {

    public function getMascotas(){
        $pdo = $this->crearConexion();
        $sql = "select * from mascotas order by nombre";
        $query = $pdo->prepare($sql);
        $query->execute();
    
        $mascotas = $query->fetchAll(PDO::FETCH_OBJ);
    
        return $mascotas;
    }

    public function getMascotaById($id_mascota){
        $pdo = $this->crearConexion();
        $sql = "SELECT * FROM mascotas WHERE id = ?";
        $query = $pdo->prepare($sql);
        $query->execute([$id_mascota]);
        $mascota = $query->fetch(PDO::FETCH_OBJ);
        return $mascota;
    }

    public function updateMascota($historia_clinica, $id){
        $pdo = $this->crearConexion();

        $sql = 'UPDATE mascotas SET historia_clinica = ? 
                WHERE id = ?';

        $query = $pdo->prepare($sql);
        try {
            $query->execute([$historia_clinica, $id]);
            
        } catch (\Throwable $th) {
            return null;
        }
    }

}


