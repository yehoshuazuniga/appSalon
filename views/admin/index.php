<h1 class="nombre-pagina">Panel de administración</h1>
<?php include __DIR__ . '/../templates/barra.php'; ?>
<h2 class="descripcion-pagina">Buscar citas</h2>
<div class="citas-admin"></div>

<div class="busqueda">
    <form action="" class="formulario">
        <div class="campo">
            <label for="fecha">Fecha</label>
            <input type="date" name="fecha" id="fecha" value="<?php echo $fecha; ?>">
        </div>
    </form>
</div>
<?php
if (count($citas) === 0) {
    echo '<h2>No hay citas en esta fecha</h2>';
}
?>

<div id="citas-admin">
    <ul class="citas">
        <?php
        $idCita = '';
        foreach ($citas as $key => $cita) {
            if ($idCita !== $cita->id) {
                $total = 0;
        ?>
                <li>
                    <p>ID : <span><?php echo $cita->id; ?></span></p>
                    <p>Hora : <span><?php echo $cita->hora; ?></span></p>
                    <p>Cliente : <span><?php echo $cita->cliente; ?></span></p>
                    <p>Email : <span><?php echo $cita->email; ?></span></p>
                    <p>Telefono : <span><?php echo $cita->telefono; ?></span></p>
                    <h3>Servicios</h3>
                <?php
                $idCita = $cita->id;
            }
            $total += $cita->precio;
                ?>
                <p class="servicio"><?php echo $cita->servicio . ' ' . $cita->precio; ?></p>
                <?php

                $actual = $cita->id;
                $proximo = $citas[$key + 1]->id ?? 0;
                if (esUltimo($actual, $proximo)) {
                ?>
                    <p class="total"><span>Total: </span><?php echo $total; ?></p>
                    <form action="/api/eliminar" method="POST">
                        <input type="hidden" name='id' value="<?php echo $cita->id; ?>">
                        <input type="submit" class="boton-eliminar" value="Eliminar">
                    </form>
            <?php
                }
            } // fin foreach

            ?>

    </ul>
</div>
<?php
$script =
    "<script src='build/js/buscardor.js'></script>";
?>