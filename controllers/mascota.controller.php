<?php

require_once '../models/Mascota.php';

if(isset($_POST['operacion'])){

    $mascota = new Mascota();

    if($_POST['operacion'] == 'listar'){

        $datosObtenidos = $mascota->listarMascotas();
        //o se enviará un JSON, sino el controlador reenderizará las filas que se necesita

        //Paso 1.-Verificar que el objeto contenga datos
        if ($datosObtenidos){
            $numeroFila = 1;

            //Paso 2.-Recorrer todo el objeto
            foreach($datosObtenidos as $mascota){
                //Paso 3.-Ahora construimos la filas
                echo "
                <tr>
                    <td>{$numeroFila}</td>
                    <td>{$mascota['nombre']}</td>
                    <td>{$mascota['edad']}</td>
                    <td>{$mascota['raza']}</td>
                    <td>{$mascota['tamaño']}</td>
                    <td>{$mascota['peso']}</td>
                    <td>{$mascota['nacionalidad']}</td>
                    <td>{$mascota['fechaupdate']}</td>
                    <td>
                        <a href='#' data-idmascota='{$mascota['idmascota']}'class='btn btn-danger btn-sm eliminar'><i class='bi bi-trash3'></i></a>
                        <a href='#' data-idmascota='{$mascota['idmascota']}'class='btn btn-info btn-sm editar'><i class='bi bi-pencil'></i></a>
                    </td>
                </tr>
                ";
                $numeroFila++;
            } 
        }
    }
    if($_POST['operacion'] == 'registrar'){

        //Paso 1 .-Recoger los datos que nos envía la vista (FORM, utilizando AJAX)
        //$_POST .-Esto es lo que se nos envía desde Form
        $datosForm = [
            "nombre"        =>  $_POST['nombre'],
            "edad"          =>  $_POST['edad'],
            "raza"          =>  $_POST['raza'],
            "tamaño"        =>  $_POST['tamaño'],
            "peso"          =>  $_POST['peso'],
            "nacionalidad"  =>  $_POST['nacionalidad'],
            "fechaupdate"   =>  $_POST['fechaupdate']
        ];
        //Paso 2 .-Enviar el arreglo como parámetro del método registrar 
        $mascota->registrarMascota($datosForm);
    }

    if($_POST['operacion'] == 'eliminar'){
        $mascota->eliminarMascota($_POST['idmascota']);
    }
}