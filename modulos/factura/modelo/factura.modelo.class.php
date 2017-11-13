<?php

/**
 *  Modelo
 * 
 *  Objetivo:   Realizar operaciones con la base de datos.
 * 
 */
class ModeloFactura{
    
    /* Database */
    private $database;
    
    /* Constructor */
    public function __construct($database){
        $this->database = $database;
    }
   
    /**
     * Obtiene el listado de facturas
     */
    public function obtenerListado(){
        return $this->database->consulta(
            "SELECT Factura.identificador, Cliente.nombre AS nombre_cliente, Vehiculo.placa AS placa_vehiculo 
             FROM Factura 
             INNER JOIN Cliente ON Factura.identificador_cliente = Cliente.identificador 
             INNER JOIN Vehiculo ON Factura.identificador_vehiculo = Vehiculo.identificador"
        );
    }
    
    /**
     *  Guardar la informacion del cliente
     */
     /*
    public function guardar($cedula, $nombre, $telefono){
        
        $resultado = $this->database->consulta(
            sprintf("INSERT INTO Cliente (cedula, nombre, telefono) VALUES ('%s', '%s', '%s')", $cedula, $nombre, $telefono)
        );
        
        return $resultado;
    }

    */    
}

?>