<h1 class="nombre-pagina">Recuperar password</h1>
<p class="descripcion-pagina">Coloca tu nueva password a continuacion</p>
<?php
include_once __DIR__ . '/../templates/alertas.php';
?>
<?php
    if($error) return ; 
?>


<form method="POST" class="formulario">
    <div class="campo">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="password" placeholder="Nuevo password" />
    </div>

    <input type="submit" value="Restablecer password" class="boton">
</form>
<div class="acciones">
    <a href="/">Ya tienes una cuenta, inicia sesion</a> &nbsp;
    <a href="/crear-cuenta">Obten una cuenta</a>
</div>