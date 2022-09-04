<?php

namespace Model;

class Usuario extends ActiveRecord
{
    // base de datos
    protected static $tabla = 'usuarios';
    protected static $columnasDB = [
        'id',
        'nombre',
        'apellido',
        'email',
        'password',
        'telefono',
        'admin',
        'confirmado',
        'token'
    ];
    public $id;
    public $nombre;
    public $apellido;
    public $email;
    public $password;
    public $telefono;
    public $admin;
    public $confirmado;
    public $token;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? null;
        $this->apellido = $args['apellido'] ?? null;
        $this->email = $args['email'] ?? null;
        $this->password = $args['password'] ?? null;
        $this->telefono = $args['telefono'] ?? null;
        $this->admin = $args['admin'] ?? 0;
        $this->confirmado = $args['confirmado'] ?? 0;
        $this->token = $args['token'] ?? null;
    }

    //mensaje de validacion para la creacion de una cuenta
    public function validarNuevaCuenta()
    {
        if (!$this->nombre) {
            self::$alertas['error'][] = 'Se debe de introducir un nombre';
        }
        if (!$this->apellido) {
            self::$alertas['error'][] = 'Se debe de introducir un apellido';
        }
        if (!$this->telefono) {
            self::$alertas['error'][] = 'Se debe de introducir un telefono';
        }
        if (!$this->email) {
            self::$alertas['error'][] = 'Se debe de introducir un email';
        }
        if (!$this->password) {
            self::$alertas['error'][] = 'Se debe de introducir un password';
        }

        if (strlen($this->password) < 6) {
            self::$alertas['error'][] = 'Se debe de introducir un password con mas de 6 caracteres';
        }


        return self::$alertas;
    }

    public function validarLogin()
    {
        if (!$this->email) {
            self::$alertas['error'][]                                                                   = 'El email es obligatorio';
        }
        if (!$this->password) {
            self::$alertas['error'][]                                                                   = 'El password es obligatorio';
        }
        return self::$alertas;
    }
    public function validarEmail()
    {
        if (!$this->email) {
            self::$alertas['error'][] = 'Se debe de introducir un email';
        }
        return self::$alertas;
    }

    public function validarPassword(){

        if (!$this->password) {
            self::$alertas['error'][] = 'Se debe de introducir un password';
        }

        if (strlen($this->password) < 6) {
            self::$alertas['error'][] = 'Se debe de introducir un password con mas de 6 caracteres';
        }
        return self::$alertas;
    }

    // comprueba la existensia del usuario
    public function existeUsuario()
    {
        $query = "SELECT * FROM ";
        $query .= self::$tabla;
        $query .= " WHERE email = '" . $this->email . "' LIMIT 1";
        $resultado = self::$db->query($query);

        if ($resultado->num_rows) {
            self::$alertas['error'][] = 'Usuario <b>YA</b> registrado';
        }
        return $resultado;
    }

    public function hashPassword()
    {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }
    public function crearToken()
    {
        $this->token = uniqid();
    }

    public function comprobarPasswordAndVerificado($password)
    {
        //debuguear($this);
        $resultado = password_verify($password, $this->password);

        if(!$resultado || !$this->confirmado){
            self::$alertas['error'][] = 'Password incorrecto o usuario no confirmado';
        }else{
           return true;
        }
       // return $resultado;
    }
}
