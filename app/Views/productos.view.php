<?php

class ProductosView {

    public function showStock($productos){
    include_once './templates/header.php';
    ?>
    
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
                        <td><?= $producto->stock; ?></td>
                        <td>
                            <form action="descontarstock" method="POST">
                                <input type="hidden" name="producto_id" value="<?= $producto->id; ?>">
                                <input type="hidden" name="stock" value='1'>
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


<?php
include_once './templates/footer.php';
}

}