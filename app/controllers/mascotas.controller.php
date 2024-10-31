<?php

require_once 'app/models/mascotas.model.php';
require_once 'app/models/clientes.model.php';
require_once 'app/views/mascotas.view.php';

class MascotasController {
    
    private $modelMascotas;
    private $modelClientes;
    private $view;

    public function __construct() {
        $this->modelClientes = new ClientesModel();
        $this->modelMascotas = new MascotasModel();
        $this->view = new MascotasView();
    }

    public function showMascotas() {
        $mascotas = $this->modelMascotas->getMascotas();
        $clientes = $this->modelClientes->getClientes();
        $this->view->mostrarMascotas($mascotas,$clientes);
    }

    public function editarHC($id_mascota){ 
        
        $mascota = $this->modelMascotas->getMascotaById($id_mascota); 
        $this->view->formHistoriaClinica($mascota);
    }

    public function mostrarHC($id_mascota){
        $mascota = $this->modelMascotas->getMascotaById($id_mascota);
        $this->view->mostrarHistoriaClinica($mascota);
    }
    public function modificarHCMascota(){ 
            $id = $_REQUEST['id'];
            $historia_clinica = $_REQUEST['historia_clinica'];
            $this->modelViajes->updateMascota($historia_clinica, $id);
            //Redirecciono
            header('Location: ' . BASE_URL . 'home');
            
    }
}