<?php

$routesArray = explode("/",$_SERVER['REQUEST_URI']);
$routesArray = array_filter($routesArray);

/*===========================================================
 Cuando no viene ninguna petición
 ===========================================================*/
if(count($routesArray)==0){

    $json['estado']="404";
    $json['resultado']="No encontrado.";

    echo json_encode($json, http_response_code($json['estado']));

    return;
}
