<h1 class="nombre-pagina">Olvide Password</h1>
<p class="descripcion-pagina">Reestablece tu password escribiendo tu email</p>
<?php
include_once __DIR__ . '/../templates/alertas.php';
?>
<form action="/olvide" class="formulario" method="POST">
    <div class="campo">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Escribe tu email" "/>
    </div>
    <input type="submit" class="boton" value="Enviar Instrucciones">
</form>
<div class="acciones">
    <a href="/">Ya tienes una cuenta, inicia sesion</a> &nbsp;
    <a href="/crear-cuenta">Aun no tienes una cuenta? Crea una!</a> &nbsp;
</div>