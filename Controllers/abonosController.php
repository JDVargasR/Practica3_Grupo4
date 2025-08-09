<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/Practica3_Grupo4/Models/abonosModel.php';

if (isset($_POST["btnRegistrarAbono"])) {
    $idCompra = $_POST["ddlCompra"];
    $monto = $_POST["txtMonto"];

    $respuesta = RegistrarAbonoModel($idCompra, $monto);

    if ($respuesta) {
        header("location: ../../Views/Consulta/consultarProductos.php");
    } else {
        $_POST["txtMensaje"] = "El abono no fue registrado correctamente.";
    }
}

// Esta función se usa en el formulario de registro para cargar las compras pendientes
function ObtenerComprasPendientes()
{
    return ObtenerComprasPendientesModel();
}
?>