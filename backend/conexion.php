<?php
$servidor= "localhost";
$usuario = "root";
$clave = "";
$bd = "oclock";

$conexion = mysqli_connect($servidor,$usuario, $clave) or ('No encontro el servidor');
mysqli_select_db($conexion, $bd) or die ('No encontro la base de datos');
mysqli_set_charset($conexion,"utf8");
//echo "Se conecto correctamente";
?>