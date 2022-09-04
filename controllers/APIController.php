<?php

namespace Controllers;

use Model\Servicio;
use Model\Cita;
use Model\CitaServicio;

class APIController
{

    public static function index()
    {
        $servicios = Servicio::all();
        echo json_encode($servicios);
    }

    public static function guardar()
    {
        // añamacena la cita y devuelve el id
        $cita = new Cita($_POST);
        $resultado = $cita->guardar();

        $id = $resultado['id'];
      //  echo json_encode($id);
        //alc¡macena la cta y el servicio
        
        $idServicios = explode(',', $_POST['servicios']);
       // debuguear($id);
        foreach ($idServicios as $idServicio) {
            # code...
            $args = [
                'citasId' => $id,
                'serviciosId' => $idServicio
            ];
          //  debuguear($idServicio);
            $citaServicio = new CitaServicio($args);
          //  debuguear($args);
            $citaServicio->guardar();
        }

        //retornamos una respuesta
    

        echo json_encode(['resulrtado'=> $resultado]);
    }

    public static function eliminar(){
     
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
          $id = $_POST['id'];

          $cita = Cita::find($id);
          $cita->eliminar();
          header('Location: '.$_SERVER['HTTP_REFERER']);
        }
    }
}
