<?php

require_once "Conexion";

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
        
    }
}
