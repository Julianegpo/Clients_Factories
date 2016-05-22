<?php
require_once './database.php';
$name = $_POST['nombre'];
$owner = $_POST['owner'];
$dni = $_POST['dni'];
$pobl = $_POST['poblacion'];
$cp = $_POST['cp'];
$telf = $_POST['telf'];
$com=$_POST['comision'];

$db=new DataBase();

$query="INSERT INTO Factory(nombre_f, propietario, dni, poblacion, codigo_postal, telefono, comision) "
        . "VALUES ('$name', '$owner', '$dni', '$pobl', '$cp', '$telf', '$com')";
$db->executer($query);
$db->disconnect();
header("refresh: 0; url= index.php");
?>
