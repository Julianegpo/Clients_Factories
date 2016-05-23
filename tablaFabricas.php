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
                    
                    <li class='dropdown'>
                        <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>Facturas<span class='caret'></span></a>
                        <ul class='dropdown-menu'>
                            <li><a href='verFacturasFull.php'>Todas las facturas</a></li>
                            <li><a href='verFacturasNo.php'>Facturas no pagadas</a></li>
                            <li><a href='verFacturasOk.php'>Facturas pagadas</a></li>
                        </ul>
                    </li>

                </ul>
                <form class='navbar-form' method='post' role='search' action='busqueda.php'>
				<label>Filtro</label>
				<div class='form-group'>
				<select class='form-control nav navbar-nav navbar-left' name='tipo'>
					<option>-</option>
                    <option>Cliente</option>
					<option>Fábrica</option>
                </select>
                        <input type='text' class='form-control' name='seeker' placeholder='Buscar'>
				<button type="submit" class='btn btn-default'><span class='glyphicon glyphicon-search' aria-hidden='true'></span></button>
					</div>
                </form>
            </div>
        </div>
    </nav>
        <div class='container'>
            <div class='panel panel-default'>
                <!-- Default panel contents -->
                <div class='panel-heading'>Fábricas registradas</div>

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
                            <label>Propietario</label>
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
                        <td>
                            <label>Comisión (%)</label>
                        </td>
                        <td class='text text-primary'>
                            <label>Gestión</label>
                        </td>
                    </tr>

                    <tr>
                        <?php
                        $query = "SELECT * FROM Factory";

                        $fabricas = $db->executer($query);
                        $fabricas = $db->getResultados();
                        echo "<tr>";
                        foreach ($fabricas as $fabrica) {
                            echo "<td>$fabrica[0]</td>";
                            echo "<td>$fabrica[1]</td>";
                            echo "<td>$fabrica[2]</td>";
                            echo "<td>$fabrica[3]</td>";
                            echo "<td>$fabrica[4]</td>";
                            echo "<td>$fabrica[5]</td>";
                            echo "<td>$fabrica[6]</td>";
                            echo "<td>$fabrica[7]</td>";

                            echo "<td>
                            <a href='modificarFabrica.php?id_fabr=$fabrica[0]' class='btn alert-warning'>
                                <text>Modificar</text>
                                <span class='glyphicon glyphicon-pencil'/>
                            </a>
                        </td>
                        <td>
                            <a href='eliminarFabrica.php?id=$fabrica[0]' class='btn alert-danger'>
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
