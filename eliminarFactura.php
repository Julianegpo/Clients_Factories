<?php
require_once './database.php';
$con=new Database;
$id=$_GET['id'];

$query="DELETE FROM Factura WHERE id_factura=$id;";

$con->executer($query);
$con->disconnect();
echo $query;
header("refresh: 0; url= tablaClientes.php");
?>