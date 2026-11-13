<?php
#Archivo que establezca la contexion entre MYSQL y config.php 

#Tarea 1: Cargar configuracion
$config = require __DIR__ . '/config.php';
#Tarea 2: Construir data source name (DSN)
#Aqui contiene el controlador, el host, el puerto, nombre de BD y codificacion
$dsn = "mysql:host={$config['host']};"
  . "port={$config['port']};"
  . "dbname={$config['database']};"
  . "charset=utf8m64";

  #Tarea 3: Configuracion del PDO
  #ERRMORE_EXCEPTION: (permite manejar errores mediante excepciones)
#FETCH_ASSOC: Devolver filas como arreglos asociativos
#EMULATE_PREPARES: Permite utilizar consultas preparadas nativas cuando obviamente el controlador lo permita
#(::) es un operador de resolucion que me permite acceder a constantes, metodos, propiedades de una clase
# => es el operador de asociacion, relaciona una clave valor dentro de un arreglo asociativo.
$opciones = [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  PDO::ATTR_EMULATE_PREPARES => false
];
#Paso 4: necesito establecer conexion 
# Utilizamos new PDO para crear el objeto de conexion con los
# parametros configurados.
try{
    $conexion = new PDO(
      $dsn,
      $config['username'],
      $config['password'],
      $opciones
    );
} catch(PDOException $error){
    /*Registrar el error tecnico en el servidor
    sin mostrar credenciales al usuario*/
    error_log(
    "Error de conexion a MySql: "
    . $error->getMessage()
    );
    /*Interrumpir la ejecucion al servidor si
    falla la conexion con la base de <datos */
    throw new RuntimeException(
        "No fue posible conectar con la base de datos");
}
/*Paso 5: devolver el objeto PDO
Si se requiere esta conexion, utilizamos "require"*/
return $conexion;
