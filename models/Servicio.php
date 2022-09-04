<?php
namespace Model;
class Servicio extends ActiveRecord{
    //base de datos
    protected static $tabla = 'servicios';
    protected static $columnasDB = ['id', 'nombre', 'precio'];

    public $id;
    public $nombre;
    public $precio;

    public function __construct($args = [])
    {
        $this->id =$args['id']?? null;
        $this->nombre =$args['nombre']?? null;
        $this->precio =$args['precio']?? null;
    }

    public function validar()
    {
        if(!$this->nombre){
            self::$alertas['error'][] = 'El nombre del servicio es obligatorio';
        }
        if(!$this->precio){
            self::$alertas['error'][] = 'El precio del servicio es obligatorio';
        }
    
        if(!is_numeric($this->precio) ){
            self::$alertas['error'][] = 'El precio tiene que ser un numero';
        }
    }
}