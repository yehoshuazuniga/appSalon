<h1 class="nombre-pagina">Crear cuenta</h1>
<p class="descripcion-pagina">Llena el siguiente formulario para crear una cuenta</p>
<?php 
  include_once __DIR__.'/../templates/alertas.php';
?>
<form action="/crear-cuenta" method="POST" class="formulario">
    <div class="campo">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" class="nombre" placeholder="nombre" value="<?php echo s($usuario->nombre); ?>" />
    </div>
    <div class="campo">
        <label for="apellido">Apellido</label>
        <input type="text" name="apellido" id="apellido" class="apellido" placeholder="apellido" value="<?php echo s($usuario->apellido); ?>" />
    </div>
    <div class="campo">
        <label for="telefono">Telefono</label>
        <input type="Tel" name="telefono" id="telefono" class="telefono" placeholder="telefono" value="<?php echo s($usuario->telefono); ?>" />
    </div>
    <div class="campo">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="email" placeholder="email" value="<?php echo s($usuario->email); ?>" />
    </div>
    <div class="campo">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="password" placeholder="password" />
    </div>
    <input type="submit" value="Crear Cuenta" class="boton">
</form>
<div class="acciones">
    <a href="/">Ya tienes una cuenta, inicia sesion</a> &nbsp;
    <a href="/olvide">Olvidaste tu password</a>
</div>