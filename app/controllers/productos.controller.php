<?php

require_once 'app/models/productos.model.php';
require_once 'app/views/productos.view.php';


class ProductosController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new ProductosModel();
        $this->view = new ProductosView();

    }

}