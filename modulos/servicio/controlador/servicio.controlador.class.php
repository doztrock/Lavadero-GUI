<?php

/**
 *  Controlador
 * 
 *  Objetivo:   Servir de intermediario entre el modelo y la vista.
 * 
 */

/* Incluimos el modelo */
require_once(__DIR__ . "/../modelo/servicio.modelo.class.php");

class Servicio{
    
    /* Modelo */
    private $modelo;
    
    /* Database */
    private $database;
    
    /* Constructor */
    public function __construct($database){
        
        $this->database = $database;
        
        /* Invocamos los modelos */
        $this->modelo = new ModeloServicio($this->database);
                
    }
    
    /**
     *  Funcion:    iniciar()
     * 
     *  Objetivo:   Iniciar la interfaz grafica del modulo.
     * 
     */
    public function iniciar(){
        
        /**
         * Hacemos uso de las funciones del modelo
         */
         
            // Obtenemos el listado de servicios
            $listadoServicios = $this->modelo->obtenerListado();
         
         
        /* Incluimos la vista y mostramos los resultados */
        require_once(__DIR__ . "/../vista/servicio.vista.php");
        
    }
    
    /**
     *  Funcion:    registrar()
     * 
     *  Objetivo:   Iniciar la interfaz grafica del registro de servicio.
     * 
     */
    public function registrar(){

        /* Incluimos la vista y mostramos el formulario */
        require_once(__DIR__ . "/../vista/servicio.registrar.formulario.vista.php");

    }
    
 
    /**
     *  Funcion:    guardar()
     * 
     *  Objetivo:   Guardar la informacion del registro de servicio.
     * 
     */
    public function guardar(){

        $informacion = json_decode($_POST["informacion"]);
        $servicio = array();

        foreach($informacion as $dato){
            $servicio[$dato->name] = $dato->value;
        }

        /**
         * Hacemos uso de las funciones del modelo
         */
         
            // Guardamos la informacion del servicio
            $resultado = $this->modelo->guardar($servicio["tipo"], $servicio["duracion"], $servicio["precio"], $servicio["iva"]);

            // Obtenemos el listado de servicio
            $listadoServicios = $this->modelo->obtenerListado();
         

        /* Incluimos la vista y mostramos los resultados */
        require_once(__DIR__ . "/../vista/servicio.vista.php");

    }
    
}

?>