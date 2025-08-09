<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/Practica3/Models/connect.php';

function ObtenerComprasPendientesModel()
{
    try
    {
        $context = OpenDB();

        $sp = "CALL FIDE_OBTENER_COMPRAS_PENDIENTES_SP()";
        $respuesta = $context->query($sp);

        CloseDB($context);            
        return $respuesta;
    }
    catch(Exception $error)
    {
        RegistrarError($error);
        return null;
    }
}

function RegistrarAbonoModel($idCompra, $monto)
{
    try
    {
        $context = OpenDB();

        $sp = "CALL FIDE_REGISTRAR_ABONO_SP('$idCompra', '$monto')";
        $respuesta = $context->query($sp);

        CloseDB($context);            
        return $respuesta;
    }
    catch(Exception $error)
    {
        RegistrarError($error);
        return false;
    }
}
?>