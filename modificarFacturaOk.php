<?php

require_once 'database.php';
$id = $_GET['id_factura'];
$pagada = $_POST['pagada'];
$con = new Database();

if ($pagada == 'si') {
    $query = "UPDATE Factura SET pagada=true WHERE id_factura=$id";
    $con->executer($query);
} else {
    $query = "UPDATE Factura SET pagada=false WHERE id_factura=$id";
    $con->executer($query);
}
$db->disconnect();
header("refresh: 0; url= verFacturasFull.php");
?>