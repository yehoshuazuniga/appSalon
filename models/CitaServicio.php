<?php

namespace Model;

class CitaServicio extends ActiveRecord
{
    protected static $tabla = 'citasServicios';
    protected static $columnasDB = ['id', 'citasId', 'serviciosId'];

    function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->citasId = $args['citasId'] ?? '';
        $this->serviciosId = $args['serviciosId'] ?? '';
    }
    
}
