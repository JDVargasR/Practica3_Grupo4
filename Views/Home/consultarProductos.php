<?php
    include_once $_SERVER["DOCUMENT_ROOT"] . '/Practica3_Grupo4/Views/layoutInterno.php';

?>
<!DOCTYPE html>
<html lang="es">
<?php
    AddCsss();
?>
<body>
<?php
    ShowSidebar();
    include_once $_SERVER["DOCUMENT_ROOT"] . '/Practica3_Grupo4/Controllers/principalController.php';
    $listaProductos = ConsultarProductos();
?>

<div class="main-content">
    <header>
        <h2>
            <label for="nav-toggle">
                <span class="las la-bars"></span>
            </label>
            Consulta de Productos
        </h2>
    </header>

    <main>

            <div class="card shadow-sm">
                <div class="card-body">
                    <table class="table table-hover table-bordered text-center">
                        <thead class="thead-light">
                            <tr>
                                <th style="width: 10%;">ID</th>
                                <th style="width: 30%;">Descripción</th>
                                <th style="width: 15%;">Precio</th>
                                <th style="width: 15%;">Saldo</th>
                                <th style="width: 15%;">Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($listaProductos && $listaProductos->num_rows > 0) {
                                while ($fila = $listaProductos->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $fila["Id_Compra"] . "</td>";
                                    echo "<td>" . $fila["Descripcion"] . "</td>";
                                    echo "<td>₡" . number_format($fila["Precio"], 2) . "</td>";
                                    echo "<td>₡" . number_format($fila["Saldo"], 2) . "</td>";
                                    echo "<td>" . $fila["Estado"] . "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo '<tr><td colspan="5">No hay productos para mostrar.</td></tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>

</body>
</html>