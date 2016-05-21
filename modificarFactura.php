<?php
require_once './database.php';
$db = new DataBase();
$id_factura = $_GET['id'];
?>
<html>
    <head>
        <title>Clientes y fábricas</title>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <script src='js/jquery-1.12.3.js' type='text/javascript'></script>
        <script src='js/bootstrap.min.js' type='text/javascript'></script>
        <script src='js/npm.js' type='text/javascript'></script>
        <link href='css/bootstrap.css'rel='stylesheet' type='text/css'/>
    </head>
    <nav class='navbar navbar-default'>
        <div class='container-fluid'>
            <div class='navbar-header'>
                <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#bs-example-navbar-collapse-1' aria-expanded='false'>
                    <span class='sr-only'></span>
                    <span class='icon-bar'></span>
                    <span class='icon-bar'></span>
                    <span class='icon-bar'></span>
                </button>
                <a class='navbar-brand' href='index.php'>
                    <span class='glyphicon glyphicon-home' aria-hidden='true'/>
                </a>


            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
                <ul class='nav navbar-nav navbar-right'>
                    <li><a href='registroFactura.php'>Altas</a></li>
                    <li class='dropdown'>
                        <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>Clientes<span class='caret'></span></a>
                        <ul class='dropdown-menu'>
                            <li><a href='registroCliente.php'>Registrar cliente</a></li>
                            <li><a href='tablaClientes.php'>Ver clientes</a></li>
                        </ul>
                    </li>
                    <li class='dropdown'>
                        <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>Fábricas<span class='caret'></span></a>
                        <ul class='dropdown-menu'>
                            <li><a href='registroFabrica.php'>Registrar fábrica</a></li>
                            <li><a href='tablaFabricas.php'>Ver fábricas</a></li>
                        </ul>
                    </li>
                    <li><a href='#'>Modificar</a></li>
                    <li class='dropdown'>
                        <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>Facturas<span class='caret'></span></a>
                        <ul class='dropdown-menu'>
                            <li><a href='verFacturasFull.php'>Todas las facturas</a></li>
                            <li><a href='verFacturasNo.php'>Facturas no pagadas</a></li>
                            <li><a href='verFacturasOk.php'>Facturas pagadas</a></li>
                        </ul>
                    </li>

                </ul>
                <ul class='nav navbar-nav navbar-left'>
                    <li class='dropdown'>
                        <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>Filtro<span class='caret'></span></a>
                        <ul class='dropdown-menu'>
                            <li><a href='#'>Clientes</a></li>
                            <li><a href='#'>Fábricas</a></li>
                        </ul>
                    </li>
                </ul>

                <form class='navbar-form' role='search'>
                    <div class='form-group'>
                        <input type='text' class='form-control' placeholder='Buscar'>
                    </div>
                    <a href="busqueda.php">
                        <span class='glyphicon glyphicon-search' aria-hidden='true'/>                   
                    </a>
                </form>
            </div>
        </div>
    </nav>
    <div class='container'>
        
            <?php
            $query = "SELECT * FROM Factura f, Client c, Factory fab WHERE f.id_factura=$id_factura";
            $factura = $db->executer($query);
            $factura = $db->getResultados();
            foreach ($factura as $fact) {
                extract($fact);
                    echo "<form method='post' action='modificarFacturaOk.php?id_factura=".$id_factura."'>";
                if ($cliente_id != null) {
                    echo "<label>Cliente</label>
            <input type='text' class='form-control' placeholder='$nombre_c' disabled>
            <label>Importe beneficio (€)</label>
            <input type='text' class='form-control' placeholder='$importe' disabled>  
            <label>Pagada</label>
            <div class='radio'>
                <label for='si'>
                    <input type='radio' name='pagada' id='si'>Sí
                </label>
                <label for='no'>
                    <input type='radio' name='pagada' id='no'>No
                </label>
            </div>";
                } else {
                    echo "<label>Fábrica</label>
            <input type='text' class='form-control' placeholder='$nombre_f' disabled> 
            <label>Importe beneficio (€)</label>
            <input type='text' class='form-control' placeholder='$importe' disabled>  
            <label>Pagada</label>
            <div class='radio'>
                <label for='si'>
                    <input type='radio' name='pagada' id='si' value='si'>Sí
                </label>
                <label for='no'>
                    <input type='radio' name='pagada' id='no' value='no'>No
                </label>
            </div>";
                }
            }
            ?>
            <br>
            <input type='submit' class='btn btn-primary' value='Modificar'>
        </form>
    </div>
</body>
</html>
