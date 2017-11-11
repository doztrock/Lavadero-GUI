<?php

/**
 *  Modelo
 * 
 *  Objetivo:   Realizar operaciones con la base de datos.
 * 
 */
class ModeloCliente{
    
    /* Database */
    private $database;
    
    /* Constructor */
    public function __construct($database){
        $this->database = $database;
    }
   
    /**
     * Obtiene el listado de clientes
     */
    public function obtenerListado(){
        return $this->database->consulta("SELECT identificador, cedula, nombre, telefono FROM Cliente");
    }
    
    /**
     *  Guardar la informacion del cliente
     */
    public function guardar($cedula, $nombre, $telefono){
        
        $resultado = $this->database->consulta(
            sprintf("INSERT INTO Cliente (cedula, nombre, telefono) VALUES ('%s', '%s', '%s')", $cedula, $nombre, $telefono)
        );
        
        return $resultado;
    }
    
}

?>