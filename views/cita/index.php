<h1 class="nombre-pagina">Crear nueva cita</h1>
<p class="descripcion-pagina">Elige tus servicios y oloca tus datos</p>
<?php include __DIR__.'/../templates/barra.php';?>
<div id="app">

    <nav class="tabs">
        <button class="actual" data-paso="1">Servicios</button>
        <button class=" " data-paso="2">Informacion cita</button>
        <button class=" " data-paso="3">resumen</button>

    </nav>
    <div id="paso-1" class="seccion">
        <h2>Servicios</h2>
        <p class="text-center">Elige tus servicios a continuacion</p>
        <div id="servicios" class="listado-servicios">

        </div>
    </div>
    <div id="paso-2" class="seccion">
        <h2>Tus datos y cita</h2>
        <p class="text-center">Coloca tus datos y fecha de tu cita</p>
        <form class="formulario">
            <div class="campo">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" placeholder="Escribe tu nombre" value="<?php echo $_SESSION['nombre'] ?>" class="disabled" disabled />
            </div>
            <div class="campo">
                <label for="fecha">fecha</label>
                <input type="date" id="fecha" placeholder="Elige la fecha" min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>" />
            </div>
            <div class="campo">
                <label for="hora">Hora</label>
                <input type="time" id="hora" placeholder="Elige la hora hora" />
            </div>
            <input type="hidden" name="id" id="id" value="<?php echo $_SESSION['id']; ?>">

        </form>
    </div>
    <div id="paso-3" class="seccion contenido-resumen">
        <h2>Resumen</h2>
        <p class="text-center">Verifica que la informacon sea correcta</p>

    </div>
    <div class="paginacion ">
        <button id="anterior" class="boton">&laquo; Anterior</button>
        <button id="siguiente" class="boton"> Siguiente &raquo;</button>
    </div>
</div>

<?php
$script = "<script src ='build/js/app.js'></script>
        <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>

";

?>