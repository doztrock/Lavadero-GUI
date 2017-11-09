<?php

require_once(__DIR__ . "/Configuracion.php");
require_once(__DIR__ . "/Database/Database.class.php");

class ControladorFrontal{
    
    /* Database */
    private $database;

    /* Constructor */
    public function __construct(){
        
        $this->database = new Database(Configuracion::DB_HOST, Configuracion::DB_USUARIO, Configuracion::DB_CLAVE, Configuracion::DB_NOMBRE);
        $this->database->conectar();
        
    }
    
    public function iniciar(){
        
        /* Peticion */
        $modulo = $_POST["modulo"];
        $accion = $_POST["accion"];
        
        /* Incluimos el controlador */
        require(__DIR__ . "/../modulos/$modulo/controlador/$modulo.controlador.class.php");
        
        /* Creamos el objeto */
        $controlador = new $modulo($this->database);
        
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