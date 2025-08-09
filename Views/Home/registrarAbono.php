<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/Practica3/Views/layoutInterno.php';
?>
<!DOCTYPE html>
<html lang="es">
<?php AddCsss(); ?>
<body>
<?php
ShowSidebar();
include_once $_SERVER["DOCUMENT_ROOT"] . '/Practica3/Controllers/abonosController.php';
$compras = ObtenerComprasPendientes();
?>

<div class="main-content">
    <header>
        <h2>
            <label for="nav-toggle">
                <span class="las la-bars"></span>
            </label>
            Registro de Abonos
        </h2>
    </header>
    <main>

            <div class="card shadow-sm">
                <div class="card-body">
                    <form method="POST" id="formAbono">
                        <div class="form-group">
                            <label for="ddlCompra">Compra</label>
                            <select class="form-control" name="ddlCompra" id="ddlCompra" required>
                                <option value="">Seleccione una compra</option>
                                <?php while ($compra = $compras->fetch_assoc()) : ?>
                                    <option value="<?= $compra["Id_Compra"] ?>" data-saldo="<?= $compra["Saldo"] ?>">
                                        <?= $compra["Descripcion"] ?> (₡<?= $compra["Saldo"] ?>)
                                    </option>
                                <?php endwhile; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="saldoAnterior">Saldo Anterior</label>
                            <input type="text" class="form-control" id="saldoAnterior" readonly>
                        </div>

                        <div class="form-group">
                            <label for="txtMonto">Monto a Abonar</label>
                            <input type="number" class="form-control" name="txtMonto" id="txtMonto" step="0.01" min="0.01" required>
                        </div>

                        <button type="submit" name="btnRegistrarAbono" class="btn btn-success">
                            <i class="las la-check-circle"></i> Registrar Abono
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>

</body>
</html>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script>
    $('#ddlCompra').change(function () {
        const saldo = $('option:selected', this).data('saldo');
        $('#saldoAnterior').val(saldo);
    });

    $('#formAbono').submit(function (e) {
        const saldo = parseFloat($('#saldoAnterior').val());
        const abono = parseFloat($('#txtMonto').val());

        if (abono > saldo) {
            alert('El abono no puede ser mayor al saldo anterior.');
            e.preventDefault();
        }
    });
</script>