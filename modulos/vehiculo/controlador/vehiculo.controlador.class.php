<?php

/**
 *  Controlador
 * 
 *  Objetivo:   Servir de intermediario entre el modelo y la vista.
 * 
 */

/* Incluimos el modelo */
require_once(__DIR__ . "/../modelo/vehiculo.modelo.class.php");

/* Incluimos el modelo: CLIENTE */
require_once(__DIR__ . "/../../cliente/modelo/cliente.modelo.class.php");

class Vehiculo{
    
    /* Modelo */
    private $modelo;
    private $modeloCliente;
    
    /* Database */
    private $database;
    
    /* Constructor */
    public function __construct($database){
        
        $this->database = $database;
        
        /* Invocamos los modelos */
        $this->modelo = new ModeloVehiculo($this->database);
        $this->modeloCliente = new ModeloCliente($this->database);
                
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
         
            // Obtenemos el listado de Vehiculo
            $listadoVehiculos = $this->modelo->obtenerListado();
         
         
        /* Incluimos la vista y mostramos los resultados */
        require_once(__DIR__ . "/../vista/vehiculo.vista.php");
        
    }
    
    /**
     *  Funcion:    registrar()
     * 
     *  Objetivo:   Iniciar la interfaz grafica del registro de vehiculo.
     * 
     */
    public function registrar(){

        /**
         * Hacemos uso de las funciones del modelo
         */
         
            // Obtenemos el listado de clientes
            $listadoClientes = $this->modeloCliente->obtenerListado();


        /* Incluimos la vista y mostramos el formulario */
        require_once(__DIR__ . "/../vista/vehiculo.registrar.formulario.vista.php");

    }
 
    /**
     *  Funcion:    guardar()
     * 
     *  Objetivo:   Guardar la informacion del registro de vehiculo.
     * 
     */
    public function guardar(){

        $informacion = json_decode($_POST["informacion"]);
        $vehiculo = array();

        foreach($informacion as $dato){
            $vehiculo[$dato->name] = $dato->value;
        }

        /**
         * Hacemos uso de las funciones del modelo
         */
         
            // Guardamos la informacion del vehiculo
            $resultado = $this->modelo->guardar($vehiculo["identificador_cliente"], $vehiculo["placa"], $vehiculo["modelo"], $vehiculo["color"]);

            // Obtenemos el listado de vehiculos
            $listadoVehiculos = $this->modelo->obtenerListado();
            

        /* Incluimos la vista y mostramos los resultados */
        require_once(__DIR__ . "/../vista/vehiculo.vista.php");

    }
    
}

?>