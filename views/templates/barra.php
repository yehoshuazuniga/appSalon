<div class="barra">
    <p>Hola <?php echo ucfirst($nombre) ?? ''; ?></p>
    <a href="/logout" class="boton">Cerrar sesión</a>
</div>

<?php 
    if(isset($_SESSION['admin'])){?>
<div class="barra-servicios">
    <a class="boton" href="/admin">Ver citas</a>
    <a class="boton" href="/servicios">Ver Servicio</a>
    <a class="boton" href="/servicios/crear">Nuevo Servicio</a>
</div>
    <?php }
?>