<?php
require_once './database.php';
$db=new DataBase();
$id_fabr=$_GET['id_fabr'];
$nombre = $_POST['nombre'];
$owner = $_POST['owner'];
$poblacion = $_POST['poblacion'];
$cp = $_POST['cp'];
$telf = $_POST['telf'];
$com=$_POST['comision'];

$query="UPDATE Factory SET nombre_f='$nombre', propietario='$owner', poblacion='$poblacion', "
        . "codigo_postal=$cp, telefono=$telf, comision=$com WHERE id_f=$id_fabr";
$db->executer($query);

header("refresh: 0; url= tablaFabricas.php");
?>