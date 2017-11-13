<?php

/**
 *  Modelo
 * 
 *  Objetivo:   Realizar operaciones con la base de datos.
 * 
 */
class ModeloServicio{
    
    /* Database */
    private $database;
    
    /* Constructor */
    public function __construct($database){
        $this->database = $database;
    }
   
    /**
     * Obtiene el listado de servicios
     */
    public function obtenerListado(){
        return $this->database->consulta("SELECT identificador, tipo, duracion, precio FROM ServicioTipo");
    }
    
    /**
     *  Guardar la informacion del servicio
     */
    public function guardar($tipo, $duracion, $precio){
        
        $resultado = $this->database->consulta(
            sprintf("INSERT INTO ServicioTipo (tipo, duracion, precio) VALUES ('%s', '%s', '%s')", $tipo, $duracion, $precio)
        );
        
        return $resultado;
    }
    
}

?>