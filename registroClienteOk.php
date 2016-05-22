<?php
require_once './database.php';
$name = $_POST['nombre'];
$surname = $_POST['apellido'];
$dni = $_POST['dni'];
$pobl = $_POST['poblacion'];
$cp = $_POST['cp'];
$telf = $_POST['telf'];

$db=new DataBase();

$query="INSERT INTO Client(nombre_c, apellidos, dni, poblacion, codigo_postal, telefono) "
        . "VALUES ('$name', '$surname', '$dni', '$pobl', '$cp', '$telf')";
$db->executer($query);
$db->disconnect();
header("refresh: 0; url= index.php");
?>
