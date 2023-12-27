<?php

class BaseDatos{

    private $server;
    private $user;
    private $password;
    private $database;
    private $port;
    private $conexion;


    public function __construct(){

        /*===========================================================
        Conextando a la BD
        ===========================================================*/
        $listadatos = $this->datosConexion();
        foreach ($listadatos as $key => $value) {
            $this->server = $value['server'];
            $this->user = $value['user'];
            $this->password = $value['password'];
            $this->database = $value['database'];
            $this->port = $value['port'];
        }
        $this->conexion = new mysqli($this->server,$this->user,$this->password,$this->database,$this->port);
        if($this->conexion->connect_errno){
            echo "algo va mal con la conexion";
            die();
        }

    }

    public function index() {
    }

    private function datosConexion(){
        /*===========================================================
        leyendo config con los datos de conexión
        ===========================================================*/
        $direccion = dirname(__FILE__);
        $jsondata = file_get_contents($direccion . "/" . "config");
        return json_decode($jsondata, true);
    }

    public function ListCandidato()
    {
        //Consulta que trae todos los candidatos sin condición de la tabla candidato

        $results = $this->conexion->query("SELECT * FROM candidato ORDER BY candidato");

        $resultArray = array();
        foreach ($results as $key) {
            $resultArray[] = $key;
        }

        return $resultArray;

    }

    public function ListRegion()
    {
        //Consulta que trae todas las regiones sin condición de la tabla region

        $results = $this->conexion->query("SELECT * FROM region ORDER BY region");

        $resultArray = array();
        foreach ($results as $key) {
            $resultArray[] = $key;
        }

        return $resultArray;

    }

    public function ListComunaByRegion($idRegion)
    {
        //Consulta que trae todas las regiones sin condición de la tabla region

        $results = $this->conexion->query("SELECT * FROM comuna WHERE id_region='".$idRegion."' ORDER BY comuna");

        $resultArray = array();
        foreach ($results as $key) {
            $resultArray[] = $key;
        }

        return $resultArray;
    }

    public function InsertVotante($Nombres,$Alias,$Rut,$Email,$idRegion,$idComuna,$Candidato,$Entero)
    {
        
        $results = $this->conexion->query("SELECT count(*) as TOTAL FROM votantes WHERE rut='".$Rut."'");

        $resultArray = array();
        foreach ($results as $key) {
            $resultArray[] = $key;
        }

        if((int)$resultArray[0]['TOTAL']>0){
            // Ya existe una votación
            return 2;
        }else{        
            //Inserta un registro de votación
            $results = $this->conexion->query("INSERT INTO votantes (nombres,alias,rut,email,id_region,id_comuna,candidato,entero) VALUES 
                                        ('".$Nombres."','".$Alias."','".$Rut."','".$Email."','".$idRegion."','".$idComuna."','".$Candidato."','".$Entero."')");

            $filas = $this->conexion->affected_rows;
            if($filas >= 1){
                // Graba OK
                return 1;
            }else{
                // No Graba el registro
                return 0;
            }
        }
    }

}

?>