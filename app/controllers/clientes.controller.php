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

}