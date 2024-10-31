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
$productoscontroller = new ProductosController();

switch ($params[0]) {
    case 'home':
        $clientescontroller->index();
        break;
    case 'mascotas':
        $mascotascontroller->showMascotas();
        break;
    case 'hclinica':
        $id_mascota =$params [1];
        $mascotascontroller->mostrarHC($id_mascota);
        break;
    case 'stock':
        $productoscontroller->mostrarProductos();
        break;
    case 'clientes':
        $clientescontroller->mostrarClientes();
        break;
    case 'turnos':
        $clientescontroller->mostrarTurnos();
        break;
    case 'agregarTurno':
        $clientescontroller->reservarTurno();
        break;
    
    default:
        
        ?><img src="img/404.jpg" alt="..."><?php
        break;
}