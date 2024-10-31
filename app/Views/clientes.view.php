<?php


class ClientesView {

    public function showIndex(){
    include_once 'templates/header.php';
?>
    <section>
        <h2>Cuidado Profesional para tus Mascotas</h2>
        <p>En Veterinaria San Andres ofrecemos el mejor cuidado para tus mascotas. Contamos con servicios de vacunación, desparasitación, cirugía y más.</p>
        <p>¡Confía en nuestros profesionales para mantener a tu mascota sana y feliz!</p>
    </section>
<?php
include_once 'templates/footer.php';
}
public function mostrarTurnos($turnos){
    include_once 'templates/header.php';
    ?>
    <section>
        <h2>Formulario de Reservas</h2>
        <form action="agregarTurno" method="POST">
            <label for="nombre">Nombre del Propietario:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="animal">Nombre de la mascota:</label>
            <input type="text" id="animal" name="animal" required>

            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" name="fecha" required>

            <label for="hora">Hora:</label>
            <input type="time" id="hora" name="hora" required>
            <button type="submit">Reserver Turno</button>
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
                    <td><?= $turno->mascota; ?></td>
                    <td class="fecha"><?= $turno->fecha; ?></td>
                    <td><?= $turno->hora; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>
<?php
include_once 'templates/footer.php';
}
}