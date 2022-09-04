<?php 

namespace Controllers;

use Model\AdminCita;
use MVC\Router;

class AdminController {
    public static function index(Router $router){
        //session_start();
        isAdmin();
        $fecha = $_GET['fecha'] ?? date('Y-m-d');

        $fechaAux = explode('-',$fecha);
        if(!checkdate($fechaAux[1], $fechaAux[2], $fechaAux[0])) header('Location: /404');
        //consultar la base de datos

        $consulta = "SELECT citas.id, citas.hora, CONCAT( usuarios.nombre, ' ', usuarios.apellido) as cliente, ";
        $consulta .= " usuarios.email, usuarios.telefono, servicios.nombre as servicio, servicios.precio  ";
        $consulta .= " FROM citas  ";
        $consulta .= " LEFT OUTER JOIN usuarios ";
        $consulta .= " ON citas.usuarioId=usuarios.id  ";
        $consulta .= " LEFT OUTER JOIN citasServicios ";
        $consulta .= " ON citasServicios.citasId=citas.id ";
        $consulta .= " LEFT OUTER JOIN servicios ";
        $consulta .= " ON servicios.id=citasServicios.serviciosId ";
        $consulta .= " WHERE fecha =  '${fecha}' ";
        $citas =AdminCita::SQL($consulta);

        $router->render('admin/index', [
            'nombre'=> $_SESSION['nombre'], 
            'citas' =>$citas,
            'fecha'=> $fecha
        ]);

    }
}