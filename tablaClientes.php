<?php
require_once './database.php';
$db = new DataBase();
?>
<html>
    <head>
        <title>Clientes y fábricas</title>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <script src='js/jquery-1.12.3.js' type='text/javascript'></script>
        <script src='js/bootstrap.min.js' type='text/javascript'></script>
        <script src='js/npm.js' type='text/javascript'></script>
        <link href='css/bootstrap.css' rel='stylesheet' type='text/css'/>
    </head>
    <body>
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
            <div class='panel panel-default'>
                <!-- Default panel contents -->
                <div class='panel-heading'>Clientes registrados</div>
                <!-- Table -->
                <table class='table'>
                    <tr>
                        <td>
                            <label>Código</label>
                        </td>
                        <td>
                            <label>Nombre</label>
                        </td>
                        <td>
                            <label>Apellido</label>
                        </td>
                        <td>
                            <label>DNI</label>
                        </td>
                        <td>
                            <label>Población</label>
                        </td>
                        <td>
                            <label>Código postal</label>
                        </td>
                        <td>
                            <label>Teléfono</label>
                        </td>
                        <td class='text text-primary'>
                            <label>Gestión</label>
                        </td>
                    </tr>

                    <tr>
                        <?php
                        $query = "SELECT * FROM Client";

                        $clientes = $db->executer($query);
                        $clientes = $db->getResultados();
                        foreach ($clientes as $cliente) {
                            echo "<td>$cliente[0]</td>";
                            echo "<td>$cliente[1]</td>";
                            echo "<td>$cliente[2]</td>";
                            echo "<td>$cliente[3]</td>";
                            echo "<td>$cliente[4]</td>";
                            echo "<td>$cliente[5]</td>";
                            echo "<td>$cliente[6]</td>";

                            echo "<td>
                            <a href='modificarCliente.php?id=$cliente[0]' class='btn alert-warning'>
                                <text>Modificar</text>
                                <span class='glyphicon glyphicon-pencil'/>
                            </a>
                        </td>
                        <td>
                            <a href='eliminarCliente.php?id=$cliente[0]' class='btn alert-danger'>
                                <text>Eliminar</text>
                                <span class='glyphicon glyphicon-remove'/>
                            </a>
                            </td>
                            </tr>";
                        }
                        $db->disconnect();
                        ?>
                </table>
            </div>
        </div>
    </body>
</html>
