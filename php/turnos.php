<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veterinaria - Turnos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Turnos</h1>
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
        <h2>Formulario de Reservas</h2>
        <form action="reservar_turno" method="POST">
            <label for="nombre">Nombre del Propietario:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="animal">Nombre del Animal:</label>
            <input type="text" id="animal" name="animal" required>

            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" name="fecha" required>

            <label for="hora">Hora:</label>
            <input type="time" id="hora" name="hora" required>

            <input type="submit" value="Reservar Turno">
        </form>

        <h2>Turnos Reservados</h2>
        <table>
            <thead>
                <tr>
                    <th>Nombre del Propietario</th>
                    <th>Nombre del Animal</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($turnos as $turno): ?>
                    <tr>
                        <td><?= $turno->nombre; ?></td>
                        <td><?= $turno->animal; ?></td>
                        <td><?= $turno->fecha; ?></td>
                        <td><?= $turno->hora; ?></td>
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