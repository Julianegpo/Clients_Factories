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
        <?php
        $query = "SELECT * FROM Client";
        $clientes = $db->executer($query);
        $clientes = $db->getResultados();
        
        $query2="SELECT * FROM Factory";
        $fabricas = $db->executer($query2);
        $fabricas = $db->getResultados();
        ?>
        <div class='container'>
            <form method='post' action='registroFacturaOk.php'>

                <label>Cliente</label>
                <select class='form-control' name='cliente'>
                    <?php
                    echo "<option>-</option>";
                    foreach($clientes as $cliente) {
                        
                        echo "<option value='$cliente[0]'>$cliente[1]</option>";
                    }
                    ?>
                </select>
                <label>Fábrica</label>
                <select class='form-control' name='fabrica'>
                    <?php
                    echo "<option>-</option>";
                    foreach($fabricas as $fabrica){
                        echo "<option value='$fabrica[0]'>$fabrica[1]</option>";
                    }
                    ?>
                </select>
                <label>Importe beneficio (€)</label>
                <input type='text' class='form-control' name='importe' placeholder='Importe'>  
                <label>Pagada</label>
                <div class='radio'>
                    <label for='si'>
                        <input type='radio' name='pagada' value='si'>Sí
                    </label>
                    <label for='no'>
                        <input type='radio' name='pagada' value='no'>No
                    </label>  
                </div>
                <br>
                <input type='submit' class='btn btn-primary' value='Crear factura'>
            </form>
        </div>
    </body>
</html>