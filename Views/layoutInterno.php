<?php

function AddCsss()
{
    echo
    '<head>
        <meta charset="UTF-8">
        <title>Sistema de Abonos</title>
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
        <link rel="stylesheet" href="/Practica3_Grupo4/Views/Estilos/style.css">
        <link href="/Practica3_Grupo4/Views/Estilos/formulario.css" rel="stylesheet">
    </head>';
}

function ShowSidebar()
{
    echo
    '<input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <a href="/Practica3_Grupo4/Views/Home/inicio.php" style="text-decoration: none; color: inherit;">
                <h2 style="margin: 0; padding: 10px;">
                    <span class="la la-bank"></span> <span>Practica 3</span>
                </h2>
            </a>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                        <a href="consultarProductos.php"><span class="la la-box"></span>
                        <span>Consultar Productos</span></a>
                    </li>
                    <li>
                        <a href="registrarAbono.php"><span class="la la-dollar-sign"></span>
                        <span>Registrar Abono</span></a>
                    </li>
            </ul>
        </div>
    </div>';
}

?>


