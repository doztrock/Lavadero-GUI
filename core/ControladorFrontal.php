<?php

require_once(__DIR__ . "/Configuracion.php");
require_once(__DIR__ . "/Database/Database.class.php");

class ControladorFrontal{
    
    /* Database */
    private $database;
    
    /* Modulos soportados */
    private $MODULO = array(
        "cliente"
    );
    
    /* Constructor */
    public function __construct(){
        
        $database = new Database(Configuracion::DB_HOST, Configuracion::DB_USUARIO, Configuracion::DB_CLAVE, Configuracion::DB_NOMBRE);
        $database->conectar();
        
        return;
    }
    
    public function iniciar(){
        
        /* Peticion */
        $modulo = $_POST["modulo"];
        $accion = $_POST["accion"];
        
        /* Incluimos el controlador */
        require(__DIR__ . "/../modulos/$modulo/controlador/$modulo.controlador.class.php");
        
        /* Creamos el objeto */
        $controlador = new $modulo();
        
        /* Ejecutamos la accion */
        $controlador->$accion();
        
        return;
    }
    
}

/* Ejecutamos el controlador */
$controlador = new ControladorFrontal();
$controlador->iniciar();

unset($controlador);

?>