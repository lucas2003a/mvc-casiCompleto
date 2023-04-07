<?php

class Conexion{

    private $host = "localhost"; //SERVIDOR
    private $port = "3306";     //PUERTO DE COMUNICACION
    private $database = "mascotas";//NOMBRE BD
    private $charset = "UTF8";      //CODIIFIACION(IDIOMA)
    private $user = "root";      //USUARIO
    private $password = "";    //CONTRASEÑA

    //atributo que almacena la conexion
    private $pdo;

    //MÈTODO 1 PARA ACCEDER A LA BD
    PRIVATE function conectarServidor(){
      //Constructor:
        //neew PDO("CADENA_CONEXION","USER","PASWORD");
        $conexion = new PDO("mysql:host={$this->host};port={$this->port};dbname={$this->database};charset={$this->charset}",$this->user,$this->password); 
        
        return $conexion;

    }

    //Método 2 : retornar el acceso
    public function getConexion(){
        try{
            //Pasar la conexión el atributo/obeto $pdo
            $this->pdo = $this->conectarServidor();
            //control de errores (TRY-CATCH)
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //RETORNAMOS LA CONEXIÓN AL MDELO QUE LO NECESITE
            return $this->pdo;
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }


}