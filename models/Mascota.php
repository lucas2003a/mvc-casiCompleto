<?php

require_once "Conexion.php";

//MODELO = CONTIENEE A LOGICA
//EXTENDS = HERENCIA (POO) EN PHP

class Mascota extends Conexion{
    
    //objeto que almacena la conexión que viene desde el padre(Conexion)y la compartirá con todos los métodos CRUD
    private $accesoBD;

    //Constructor,inicializar
    public function __CONSTRUCT(){
        $this->accesoBD = parent::getConexion();
    }

    //Método listar cursos
    public function listarMascotas(){
        try{
            //1.-Preparamos ala consulta
            $consulta = $this->accesoBD->prepare("CALL spu_mascotas_listar()");
            //2.-EJecutamso la consulta
            $consulta->execute();
            //3.-Devolvemos el resultado del(array asociativo)
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function registrarMascota($datos = []){
        try{
            //1.-Preparamos la consulta
            $consulta = $this->accesoBD->prepare("CALL spu_mascotas_registrar(?,?,?,?,?,?,?)");
            //2.-Ejecutamos la consulta
            $consulta->execute(
                array(
                    $datos["nombre"],
                    $datos["edad"],
                    $datos["raza"],
                    $datos["peso"],
                    $datos["tamaño"],
                    $datos["nacionalidad"],
                    $datos["fechaupdate"]
                )
            );
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function eliminarMascota($idmascota = 0){
        try{
            $consulta = $this->accesoBD->prepare("CALL spu_mascotas_eliminar(?)");
            $consulta->execute(array($idmascota));
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function actualizarMascota(){
        try{

        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
}
