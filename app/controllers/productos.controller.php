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

    public function mostrarProductos(){
        $productos = $this->model->getProductos();
        $this->view->showStock($productos);
    }

    public function descontarStock(){ 
            $id = $_REQUEST['producto_id'];
            $stock = $_REQUEST['stock'];
            $this->model->descontarElemento($stock, $id);
            header('Location: ' . BASE_URL . 'stock');

        
    }

}