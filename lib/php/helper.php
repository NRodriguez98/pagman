<?php

function crearUrl($modulo, $controlador, $accion, $parametros=false){
    
    if(isset($parametros) && is_array($parametros)){
        $parametrosPlus = implode("/", $parametros);
        $url = $_SERVER['SCRIPT_NAME']."/$modulo/$controlador/$accion/$parametrosPlus";
    }else{
        $url = $_SERVER['SCRIPT_NAME']."/$modulo/$controlador/$accion";
    }

    return $url;

}

function dd($array){
    echo "<pre>";
    die(print_r($array));
}

function addLib($enlace){
    
    // Se reemplaza en la cadena SCRIPT_NAME es archivo index.php por vacio
    $url = str_replace('index.php','',$_SERVER['SCRIPT_NAME']);
    
    return $url."$enlace";
}

function addLibErrors($enlace){
    
    // Se reemplaza en la cadena SCRIPT_NAME es archivo index.php por vacio
    $url = str_replace('templates/adminMaterialize/errors/error.php','',$_SERVER['SCRIPT_NAME']);
    
    return $url."$enlace";
}

function redirect($url){
    echo "<script type='text/javascript'>window.location.href='$url'</script>";
}

function getDocumentRoot(){
    return str_replace("/web/index.php","",$_SERVER['SCRIPT_FILENAME']);
}


//------------------ Inicio funcion de errores/ validaciones del servidor-------

function setErrores($errores =  array()){
    
    $mensajeError="";
    
    if(is_array($errores) && count($errores)>0){
        
        $mensajeError = "<h6><strong>Por favor corregir los siguientes errores: </strong></h6>"
                . "<ul>";
        
        foreach ($errores as $error){
            
            $mensajeError .= "<li>* ".$error."</li>";
        }
        
        $mensajeError .= "</ul>";

    }
    
    $_SESSION['mensajeError'] = $mensajeError;
    
}

function getErrores(){
    
    $mensajeError="";
    
    if(isset($_SESSION['mensajeError'])){

        $mensajeError = $_SESSION['mensajeError'];
        unset($_SESSION['mensajeError']);
    }

    return $mensajeError;
}

//------------------ Fin funcion de errores/ validaciones del servidor----------

//------------------ Inicio función para errores de validación servidor AJAX----

function getRespuestaAccion(){
    $accion=true; $mensajes="Acci&oacute;n exitosa. ";
    if(isset($_SESSION['mensajeError'])){
        $accion=false;
        $mensajes=$_SESSION['mensajeError'];
        unset($_SESSION['mensajeError']);
    }
    return json_encode(array('accion'=>$accion, 'mensajes'=>$mensajes));
}
//------------------ Fin función para errores de validación servidor AJAX-------