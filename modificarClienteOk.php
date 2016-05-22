<?php
require_once './database.php';
$db=new Database();
$id=$_GET['id'];
$poblacion = $_POST['pobl'];
$cp = $_POST['cp'];
$telf = $_POST['telf'];

$query="UPDATE Client SET poblacion='$poblacion',"
        . " codigo_postal=$cp, telefono=$telf WHERE id_c=$id";

$db->executer($query);
$db->disconnect();
header("refresh: 0; url= tablaClientes.php");

?>