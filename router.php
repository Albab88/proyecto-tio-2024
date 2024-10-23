<?php
    require_once 'app/controllers/mascotas.controller.php';
    require_once 'app/controllers/clientes.controller.php';
    require_once 'app/controllers/productos.controller.php';


define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');


$action = 'home'; 
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}


$params = explode('/', $action); //

$mascotascontroller = new MascotasController();
$clientescontroller = new ClientesController();
$prodcutoscontroller = new ProductosController();

switch ($params[0]) {
    case 'home':
        $mascotascontroller->showAnimales();
        break;
    case 'stock':
        $prodcutoscontroller->mostrarProductos();
        break;
    case 'clientes':
        $clientescontroller->mostrarClientes();
        break;
    
    default:
        
        ?><img src="img/404.jpg" alt="..."><?php
        break;
}