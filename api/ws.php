<?php

require_once "../clases/respuesta.php";
require_once "../clases/BaseDatos.php";

        
        $_respuesta = new respuesta;
        $_BaseDatos = new BaseDatos;

        //return "Hola";

        if($_SERVER['REQUEST_METHOD'] == "POST"){

            // Para consultas en Postman habilitar la siguiente linea
            //$_POST = json_decode(file_get_contents("php://input"), true);

            if (isset($_POST['t_name'])){ 
                
                switch ($_POST['t_name']) {
                    case 'ListRegion': //Lista las regiones de la tabla region de la BD
                        echo json_encode($_BaseDatos->ListRegion());
                        break;
                    case 'ListCandidato': //Lista los candidatos de la tabla candidatos de la BD
                        echo json_encode($_BaseDatos->ListCandidato());
                        break;
                    case 'ListComunaByRegion': //Lista las comunas de una región dada
                        echo json_encode($_BaseDatos->ListComunaByRegion($_POST['region']));
                        break;
                    case 'InsertVotante': //Inserta una nueva votación si existen todos los datos
                        if (isset($_POST['Nombres']) && 
                            isset($_POST['Alias']) && 
                            isset($_POST['Rut']) && 
                            isset($_POST['Email']) && 
                            isset($_POST['idRegion']) && 
                            isset($_POST['idComuna']) && 
                            isset($_POST['Candidato']) && 
                            isset($_POST['Entero'])){ 

                            echo json_encode($_BaseDatos->InsertVotante($_POST['Nombres'],$_POST['Alias'],$_POST['Rut'],$_POST['Email'],
                                                                    $_POST['idRegion'],$_POST['idComuna'],$_POST['Candidato'],$_POST['Entero']));

                        }else{

                            echo json_encode($_respuesta->error_200("Datos Incorrectos"));

                        }
                        break;                   
                    default:
                    echo json_encode($_respuesta->error_200("Metodo Incorrecto"));
                }
                
            
            }else{

                echo json_encode($_respuesta->error_200("Acceso Incorrecto"));

            }
        }else{

            echo json_encode($_respuesta->error_200("Metodo Incorrecto"));
        }
        
        
    


?>