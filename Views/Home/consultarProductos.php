<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/Practica3_Grupo4/Views/layoutInterno.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Consulta de Productos</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap primero, luego tus CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <?php AddCsss(); ?>
</head>
<body>
<?php
ShowSidebar();
include_once $_SERVER["DOCUMENT_ROOT"] . '/Practica3_Grupo4/Controllers/principalController.php';
$listaProductos = ConsultarProductos();
?>

<div class="main-content">
  <header>
    <h2 class="page-title">
      <label for="nav-toggle" class="me-2">
        <span class="las la-bars"></span>
      </label>
      Consulta de Productos
    </h2>
  </header>

  <main class="container py-4">
    <div class="center-viewport">
      <div class="center-box w-100">

        <div class="row g-3 align-items-center mb-3">
          <div class="col-md-6">
            <h5 class="mb-1">Listado de compras</h5>
            <div class="text-muted">Revisa el precio, saldo y estado</div>
          </div>
          <div class="col-md-6">
            <div class="position-relative search-wrap">
              <i class="bi bi-search text-muted"></i>
              <input id="buscar" type="text" class="form-control" placeholder="Buscar por ID, descripción o estado…">
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-body px-3 py-0">
            <div class="table-responsive">
              <table class="table align-middle table-hover mb-0" id="tablaProductos">
                <colgroup>
                  <col class="col-id">
                  <col class="col-desc">
                  <col class="col-precio">
                  <col class="col-saldo">
                  <col class="col-estado">
                </colgroup>
                <thead>
                  <tr>
                    <th class="col-id">ID</th>
                    <th class="col-desc">Descripción</th>
                    <th class="text-end col-precio">Precio</th>
                    <th class="text-end col-saldo">Saldo</th>
                    <th class="text-center col-estado">Estado</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if ($listaProductos && $listaProductos->num_rows > 0) {
                    while ($fila = $listaProductos->fetch_assoc()) {
                      $precio = number_format((float)$fila["Precio"], 2, ',', '.');
                      $saldo  = number_format((float)$fila["Saldo"],  2, ',', '.');

                      $estadoTxt = trim($fila["Estado"]);
                      $estadoUp  = strtoupper($estadoTxt);
                      $estadoClass = 'estado-bad';
                      if ($estadoUp === 'ACTIVO' || $estadoUp === 'PAGADO') {
                        $estadoClass = 'estado-ok';
                      } elseif ($estadoUp === 'PENDIENTE') {
                        $estadoClass = 'estado-pendiente';
                      }

                      echo '<tr>';
                      echo '<td class="col-id">'.htmlspecialchars($fila["Id_Compra"]).'</td>';
                      echo '<td class="col-desc">'.htmlspecialchars($fila["Descripcion"]).'</td>';
                      echo '<td class="text-end col-precio">₡'.$precio.'</td>';
                      echo '<td class="text-end col-saldo">₡'.$saldo.'</td>';
                      echo '<td class="text-center col-estado"><span class="estado-badge '.$estadoClass.'">'.htmlspecialchars($estadoTxt).'</span></td>';
                      echo '</tr>';
                    }
                  } else {
                    echo '<tr><td colspan="5" class="text-center py-4 text-muted">No hay productos para mostrar.</td></tr>';
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>

          <div class="card-footer bg-white d-flex justify-content-between align-items-center">
            <small class="text-muted">Total de registros: <strong id="totalRegistros">
              <?= $listaProductos ? $listaProductos->num_rows : 0 ?>
            </strong></small>
            <a class="btn btn-sm btn-primary" href="../Home/registrarAbono.php">
              <i class="bi bi-plus-circle me-1"></i> Registrar Abono
            </a>
          </div>
        </div>

      </div>
    </div>
  </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="../Funciones/consultarProductos.js"></script>

</body>
</html>