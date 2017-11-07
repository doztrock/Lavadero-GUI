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
    const DB_HOST = "localhost";
    const DB_USUARIO = "root";
    const DB_CLAVE = "";
    const DB_NOMBRE = "c9";
    
    /* Informacion */
    const SOFTWARE_NOMBRE = "AutoLimpio";
    const SOFTWARE_VERSION = "1.0";
    
}

?>