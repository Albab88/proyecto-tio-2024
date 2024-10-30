<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veterinaria - Productos</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Productos para Mascotas</h1>
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
        <h2>Listado de Productos</h2>
        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $producto): ?>
                    <tr class="producto" data-stock="<?= $producto->stock; ?>">
                        <td><?= $producto->nombre; ?></td>
                        <td><?= $producto->descripcion; ?></td>
                        <td class="precio"><?= $producto->precio; ?></td>
                        <td class="stock"><?= $producto->stock; ?></td>
                        <td>
                            <form action="descontarStock" method="POST">
                                <input type="hidden" name="producto_id" value="<?= $producto->id; ?>">
                                <input type="hidden" name="precio" value="<?= $producto->precio; ?>">
                                <button type="submit" class="agregar-carrito" data-precio="<?= $producto->precio; ?>">Agregar al Carrito</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h3>Total: <span id="total-precio">$0</span></h3>
    </section>

    <footer>
        <p>&copy; 2024 Veterinaria San Andres - Todos los derechos reservados</p>
    </footer>

    <script src="js/menu.js"></script>
    <script src="js/carrito.js"></script> 
</body>
</html>