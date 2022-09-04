<h1 class="nombre-pagina">login</h1>
<p class="descripcion-pagina">Inicia sesión con tus datos</p>
<?php
include_once __DIR__ . '/../templates/alertas.php';
?>
<div class="acciones">
    <a >Iniciar sesión</a> &nbsp;
</div>
<form class="formulario" method="POST" action="/">
    <div class="campo">
        <label for="email">Email</label>
        <input type="emial" id="email" placeholder="Escribe tu email" name="email" value="<?php echo $auth->email ?>" \>
    </div>
    <div class="campo">
        <label for="passsword">Password </label>

        <input type="password" class="password" id="password" placeholder="Escribe tu password" name="password"/>
    </div>
    <input type="submit" value="Iniciar sesión" class="boton">
</form>
<div class="acciones">
    <a href="/crear-cuenta">Aun no tienes una cuenta? Crea una!</a> &nbsp;
    <a href="/olvide">Olvidaste tu password</a>
</div>