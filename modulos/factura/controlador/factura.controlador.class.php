<?php

/**
 *  Controlador
 * 
 *  Objetivo:   Servir de intermediario entre el modelo y la vista.
 * 
 */

/* Incluimos el modelo */
require_once(__DIR__ . "/../modelo/factura.modelo.class.php");

/* Incluimos el modelo: CLIENTE */
require_once(__DIR__ . "/../../cliente/modelo/cliente.modelo.class.php");

/* Incluimos el modelo: SERVICIO */
require_once(__DIR__ . "/../../servicio/modelo/servicio.modelo.class.php");

class Factura{
    
    /* Modelo */
    private $modelo;
    
    /* Database */
    private $database;
    
    /* Constructor */
    public function __construct($database){
        
        $this->database = $database;
        
        /* Invocamos los modelos */
        $this->modelo = new ModeloFactura($this->database);
        $this->modeloCliente = new ModeloCliente($this->database);
        $this->modeloServicio = new ModeloServicio($this->database);
                
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
         
            // Obtenemos el listado de facturas
            $listadoFacturas = $this->modelo->obtenerListado();
         
         
        /* Incluimos la vista y mostramos los resultados */
        require_once(__DIR__ . "/../vista/factura.vista.php");
        
    }
    
    /**
     *  Funcion:    registrar()
     * 
     *  Objetivo:   Iniciar la interfaz grafica del registro de factura.
     * 
     */
    public function registrar(){

        /**
         * Hacemos uso de las funciones del modelo
         */
         
            // Obtenemos el listado de clientes
            $listadoClientes = $this->modeloCliente->obtenerListado();

            // Obtenemos el listado de servicios
            $listadoServicios = $this->modeloServicio->obtenerListado();


        /* Incluimos la vista y mostramos el formulario */
        require_once(__DIR__ . "/../vista/factura.registrar.formulario.vista.php");

    }
 
    /**
     *  Funcion:    guardar()
     * 
     *  Objetivo:   Guardar la informacion del registro de factura.
     * 
     */
    public function guardar(){

        $informacion = json_decode($_POST["informacion"]);
        $factura = array();
        $detalleServicio = array();

        foreach($informacion as $dato){
            
            switch ($dato->name) {
                
                case "identificador_servicio[]":
                    $factura["detalle"]["servicio"][] = $dato->value;
                    break;
                
                case "precio_servicio[]":
                    $factura["detalle"]["precio"][] = $dato->value;
                    break;
                
                default:
                    $factura[$dato->name] = $dato->value;
                    break;
            }
            
        }

        /**
         * Hacemos uso de las funciones del modelo
         */
        
            // Guardamos la informacion de la factura
            $resultado = $this->modelo->guardar($factura["identificador_cliente"], $factura["identificador_vehiculo"], $factura["fecha"], $factura["detalle"]);

            // Obtenemos el listado de facturas
            $listadoFacturas = $this->modelo->obtenerListado();


        /* Incluimos la vista y mostramos los resultados */
        require_once(__DIR__ . "/../vista/factura.vista.php");

    }
    
}

?>