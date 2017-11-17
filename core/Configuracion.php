<?php
/**
 * En esta clase definimos las variables de configuracion de nuestro programa
 * de modo que podamos cambiar un valor, sin tener que repetir la instruccion
 * en otras partes del programa.
 */

class Configuracion{
   
    /* Entorno */
    const PRODUCCION = "PRODUCCION";
    const DESARROLLO = "DESARROLLO";
    const ENTORNO = DESARROLLO;
    
    /* Conexion a DB */
    const DB_HOST = "lavadero.cwnmy7kdyuoa.us-east-1.rds.amazonaws.com";
    const DB_USUARIO = "lavaderouser";
    const DB_CLAVE = "PwRmgGeb6QBikRy6wWCbHAnTydXX70uK";
    const DB_NOMBRE = "lavadero";
    
    /* Informacion */
    const SOFTWARE_NOMBRE = "AutoLimpio";
    const SOFTWARE_VERSION = "1.0";
    
}

?>