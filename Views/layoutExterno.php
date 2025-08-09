<?php

    function AddCss()
    {
        echo 
        '<head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
            <title>Admin</title>
            <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
            <link rel="stylesheet" href="/Practica3_Grupo4/Views/Estilos/style.css">
            <script
            src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
            crossorigin="anonymous"></script>
        </head>';
    }

    function ShowSidebarr()
    {
        echo
        '<div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class="la la-bank"></span> <span>Practica3</span></h2>
        </div>
        <!--Menu-->
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