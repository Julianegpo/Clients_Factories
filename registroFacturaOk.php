<?php

require_once './database.php';

$db = new DataBase();

$cliente = $_POST['cliente'];
$fabrica = $_POST['fabrica'];
$importe = $_POST['importe'];

$pagada = $_POST['pagada'];

if ($fabrica == '-') {
    if ($pagada == 'si') {
        $query = "INSERT INTO Factura(cliente_id, fabrica_id, importe, pagada) VALUES($cliente, null,$importe, true);";
        $db->executer($query);
    } else {
        $query = "INSERT INTO Factura(cliente_id, fabrica_id, importe, pagada) VALUES($cliente, null,$importe, false);";
        $db->executer($query);
    }
    
}
if ($cliente == '-') {
    if($pagada== 'si'){
        $query = "INSERT INTO Factura(cliente_id, fabrica_id, importe, pagada) VALUES(null, $fabrica, $importe, true)";
        $db->executer($query);
    }
    else{
        $query = "INSERT INTO Factura(cliente_id, fabrica_id, importe, pagada) VALUES(null, $fabrica, $importe, false)";
        $db->executer($query);
    }
    
}
$db->disconnect();
header("refresh: 0; url= index.php");
?>
