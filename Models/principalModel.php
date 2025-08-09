<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/Practica3/Models/connect.php';

function ConsultarProductosModel()
{
    try
    {
        $context = OpenDB();

        $sp = "CALL FIDE_CONSULTAR_PRODUCTOS_SP()";
        $respuesta = $context->query($sp);

        CloseDB($context);            
        return $respuesta;
    }
    catch(Exception $error)
    {
        return null;
    }
}
?>