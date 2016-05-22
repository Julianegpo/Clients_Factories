<?php
require_once './database.php';
$con=new Database;
$id=$_GET['id'];

$query="DELETE FROM Factory WHERE id_c=$id;";
$query2="DELETE FROM Factura WHERE fabrica_id=$id";

$con->executer($query2);
$con->executer($query);
$con->disconnect();
echo $query;
header("refresh: 0; url= tablaClientes.php");
?>