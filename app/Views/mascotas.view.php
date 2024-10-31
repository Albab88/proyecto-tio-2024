<?php
include_once 'app/models/clientes.model.php';
class MascotasView {
    public function mostrarMascotas($mascotas,$clientes){
        include_once './templates/header.php';
        
        
?>

    <section>
        <h2>Listado de Pacientes</h2>
        <table>
            <thead>
                <tr>
                    <th>Nombre del Animal</th>
                    <th>Especie</th>
                    <th>Raza</th>
                    <th>Propietario</th>
                    <th>Historia Clínica</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($mascotas as $mascota): ?>
                    <tr>
                        <td><?= $mascota->nombre; ?></td>
                        <td><?= $mascota->especie; ?></td>
                        <td><?= $mascota->raza; ?></td>
                        <td><?= $clientes[$mascota->propietario_id]->nombre ?></td>

                        <td><button type="button"><a href='hclinica/<?= $mascota->id;?>'>Ver Historia Clínica</a>
                    </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>

    <?php



include_once './templates/footer.php';

    }

    public function mostrarHistoriaClinica($mascota){
        
        ?>
        <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veterinaria - Pacientes</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <header>
    <img src="../img/veterinaria logo chico.jpg" width="200" alt="">
        <h1>Veterinaria San Andrés</h1>
        <nav>
            <ul class="menu">
                <li><a href="../home">Inicio</a></li>
                <li><a href="../stock">Productos</a></li>
                <li><a href="../turnos">Turnos</a></li>
                <li><a href="../mascotas">Mascotas</a></li>
            </ul>
        </nav>
    </header>

        <section>
            <h1>Historia clinica de <?php echo $mascota->nombre ?></h1>
            <?php echo $mascota->historia_clinica ?> 
        </section>
        <footer>
        <img src="../img/veterinaria logo chico.jpg" width= "80" alt="">
            <p>&copy; 2024 Veterinaria San Andrés - Todos los derechos reservados</p>
        </footer>

        <script src="../js/menu.js"></script>
        <script src="../js/carrito.js"></script>
    </body>
    </html>
    <?php
    }
    
}
?>