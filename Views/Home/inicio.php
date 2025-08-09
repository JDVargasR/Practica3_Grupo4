<?php
    include_once $_SERVER["DOCUMENT_ROOT"] . '/Practica3/Views/layoutInterno.php';
    include_once $_SERVER["DOCUMENT_ROOT"] . '/Practica3/Views/layoutExterno.php';

?>
<?php 

?>
<!DOCTYPE html>
<html lang="en">
    <?php
       AddCss();
    ?>

<body>
    <input type="checkbox" id="nav-toggle">
      <?php
       ShowSidebarr();
    ?>

    <div class="main-content">
        <header>
            <h2>
                <label for="nav-toggle">
                    <span class="las la-bars"></span>
                </label>
            </h2>

            <div class="user-wrapper">
                
            </div>
        </header>

        <main style="display: flex; flex-direction: column; justify-content: center; align-items: center; height: 80vh; text-align: center;">
            <h1 style="font-size: 3em;">Bienvenido al sistema</h1>
            <p style="font-size: 1.2em;">Utilice el menú lateral para navegar.</p>
            <img src="../Imagenes/icono.jpg" alt="Icono" style="margin-top: 60px; width: 140px; height: auto;">
        </main>
    </div>

</body>

</html>