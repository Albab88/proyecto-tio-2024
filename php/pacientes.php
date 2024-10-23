<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veterinaria - Pacientes</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Pacientes</h1>
        <nav>
            <ul class="menu">
                <li><a href="index.php">Inicio</a></li>
                <li><a href="php/productos.php">Productos</a></li>
                <li><a href="php/turnos.php">Turnos</a></li>
                <li><a href="php/clientes.php">Clientes</a></li>
   
            </ul>
        </nav>
    </header>

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
                <?php foreach ($pacientes as $paciente): ?>
                    <tr>
                        <td><?= $cliente->nombre; ?></td>
                        <td><?= $cliente->especie; ?></td>
                        <td><?= $cliente->raza; ?></td>
                        <td><?= $cliente->propietario; ?></td>
                        <td><a href="historia_clinica.php?id=<?= $cliente->id; ?>">Ver Historia Clínica</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>

    <footer>
        <p>&copy; 2024 Veterinaria San Andres - Todos los derechos reservados</p>
    </footer>

    <script src="js/menu.js"></script>
</body>
</html>