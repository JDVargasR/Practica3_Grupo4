<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/Practica3_Grupo4/Models/abonosModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnRegistrarAbono'])) {
    header('Content-Type: application/json; charset=utf-8');

    // Lectura y validación básica
    $idCompra  = isset($_POST['ddlCompra']) ? (int) $_POST['ddlCompra'] : 0;
    $montoRaw  = $_POST['txtMonto'] ?? null;
    $monto     = (is_numeric($montoRaw)) ? (float) $montoRaw : null;

    if ($idCompra <= 0 || $monto === null || $monto <= 0) {
        echo json_encode([
            'status'  => 'error',
            'message' => 'Datos inválidos. Verifica la compra y el monto.'
        ]);
        exit;
    }

    try {
        $respuesta = RegistrarAbonoModel($idCompra, $monto);
    } catch (Throwable $e) {
        error_log('[ABONOS_CONTROLLER] ' . $e->getMessage());
        echo json_encode([
            'status'  => 'error',
            'message' => 'Error interno al registrar el abono.'
        ]);
        exit;
    }

    if ($respuesta) {
        echo json_encode([
            'status'  => 'success',
            'message' => 'Abono registrado correctamente.'
        ]);
    } else {
        echo json_encode([
            'status'  => 'error',
            'message' => 'El abono no fue registrado correctamente.'
        ]);
    }
    exit;
}

function ObtenerComprasPendientes()
{
    return ObtenerComprasPendientesModel();
}