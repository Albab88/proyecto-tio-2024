<?php

require_once 'app/models/clientes.model.php';
require_once 'app/views/clientes.view.php';


class ClientesController {
    private $model;
    private $view;
    

    public function __construct() {
        $this->model = new ClientesModel();
        $this->view = new ClientesView();

    }
    public function index(){
        $this->view->showIndex();
    }

    public function reservarTurno(){
        $nombre = $_REQUEST['nombre'];
        $animal = $_REQUEST['animal'];
        $fecha = $_REQUEST['fecha'];
        $hora = $_REQUEST['hora'];
        $this->model->insertarReserva($nombre, $animal, $fecha, $hora);
        header('Location: ' . BASE_URL . 'turnos');
    }

    public function mostrarTurnos(){
        $turnos= $this->model->getTurnos();
        $this->view->mostrarTurnos($turnos);
    }
}