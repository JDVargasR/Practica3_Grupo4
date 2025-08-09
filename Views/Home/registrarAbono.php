<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/Practica3_Grupo4/Views/layoutInterno.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Registrar Abono</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap primero y luego los CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <?php AddCsss(); ?>
</head>

<body>
    <?php
    ShowSidebar();
    include_once $_SERVER["DOCUMENT_ROOT"] . '/Practica3_Grupo4/Controllers/abonosController.php';
    $compras = ObtenerComprasPendientes();
    ?>

    <div class="main-content">
        <header>
            <h2 class="page-title">
                <label for="nav-toggle" class="me-2">
                    <span class="las la-bars"></span>
                </label>
                Registro de Abonos
            </h2>
        </header>

        <main class="container center-vertical">
            <div class="row justify-content-center w-100">
                <div class="col-lg-8 col-xl-7">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h5 class="mb-0"><i class="bi bi-cash-coin me-2"></i>Nuevo Abono</h5>
                        </div>
                        <div class="card-body">
                            <form method="POST" id="formAbono" autocomplete="off" class="form-box">
                                <div class="mb-3">
                                    <label for="ddlCompra" class="form-label">Compra <span class="req">*</span></label>
                                    <select class="form-select" name="ddlCompra" id="ddlCompra" required>
                                        <option value="">Seleccione una compra</option>
                                        <?php while ($compra = $compras->fetch_assoc()) : ?>
                                            <option value="<?= $compra["Id_Compra"] ?>" data-saldo="<?= $compra["Saldo"] ?>">
                                                #<?= $compra["Id_Compra"] ?> — <?= htmlspecialchars($compra["Descripcion"]) ?>
                                                (Saldo: ₡<?= number_format((float)$compra["Saldo"], 2, ',', '.') ?>)
                                            </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="saldoAnterior" class="form-label">Saldo anterior</label>
                                    <div class="input-group">
                                        <span class="input-group-text">₡</span>
                                        <input type="number" class="form-control" id="saldoAnterior" value="0" step="0.01" readonly>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="txtMonto" class="form-label">Monto a abonar <span class="req">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text">₡</span>
                                        <input type="number" class="form-control" name="txtMonto" id="txtMonto" step="0.01" min="0.01" required>
                                    </div>
                                    <div class="form-text">El monto no puede ser mayor al saldo anterior.</div>
                                </div>

                                <div class="d-grid">
                                    <button type="submit" name="btnRegistrarAbono" class="btn btn-primary">
                                        <i class="bi bi-check2-circle me-1"></i> Registrar Abono
                                    </button>
                                </div>

                                <input type="hidden" name="btnRegistrarAbono" value="1">
                            </form>
                        </div>
                        <div class="card-footer bg-white">
                            <small class="text-muted">Campos marcados con <span class="req">*</span> son obligatorios.</small>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../Funciones/abonos.js"></script>
</body>

</html>