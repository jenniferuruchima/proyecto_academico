<?php
/* 
*proporcionar una plantilla de configuración para conectar 
* la base de datos de MYSQL.*/

/* este archivo no contiene contraseñas reales se puede cargar el git */
# establecer la dirección del servidor mysql
$host="127.0.0.1";
$puerto = "3306";
#Nombre de la base de datos
$nombre_BD = "proyecto_academico";
#Usuario de ejemplo en SQL
$usuario = "Academico_user";
#Definimos contraseña de administrador
$contraseña = "1234";
#Retornar estos valores como si fuera un arreglo asociativo
return [
"host" => $host,
"port" => $puerto,
"database" => $nombre_BD,
"username" => $usuario,
"password" => $contraseña
];
