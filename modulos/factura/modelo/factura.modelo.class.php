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
            "SELECT Factura.identificador, 
                    Cliente.nombre AS nombre_cliente, 
                    Vehiculo.placa AS placa_vehiculo, 
                    Factura.fecha AS fecha_factura, 
                    IFNULL(
                        (SELECT SUM(FacturaDetalle.precio) 
                         FROM FacturaDetalle 
                         WHERE FacturaDetalle.identificador_factura = Factura.identificador), 0
                    ) AS precio_factura 
             FROM Factura 
             INNER JOIN Cliente ON Factura.identificador_cliente = Cliente.identificador 
             INNER JOIN Vehiculo ON Factura.identificador_vehiculo = Vehiculo.identificador"
        );
    }
    
    /**
     *  Guardar la informacion de la factura
     */
    public function guardar($identificador_cliente, $identificador_vehiculo, $fecha, $detalle){

        $resultado = $this->database->consulta(
            sprintf("INSERT INTO Factura (identificador_cliente, identificador_vehiculo, fecha) VALUES ('%s', '%s', '%s')", $identificador_cliente, $identificador_vehiculo, $fecha)
        );
        
        if($resultado){
          
            $identificador_factura = $this->database->getLastID();
            $listado_detalle = array();
            
            for($i=0; $i<count($detalle); $i++){
                $listado_detalle[] = sprintf("('%s', '%s', '%s')", $identificador_factura, $detalle["servicio"][$i], $detalle["precio"][$i]);
            }
            
            $resultado = $this->database->consulta(
                sprintf("INSERT INTO FacturaDetalle (identificador_factura, identificador_tipo, precio) VALUES %s", implode(', ', $listado_detalle))
            );

        }

        return $resultado;
    }

}

?>