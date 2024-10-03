<?php $classBody = "asistentesList";
include "includes/header.php"; ?>
<main>
    <?php
    $mainHeaderTitle = "Asistentes";
    $action = '<a href="/miembros/acuarela-app-web/agregar-asistente" class="btn btn-action-primary enfasis btn-big">Agregar asistente</a>';
    include "templates/sectionHeader.php";
    ?>
    <div class="content">
        <div class="emptyElement">
            <h2>No hay Asistentes creados</h2>
            <p>Para agregar un Asistente, haz clic en el botón<strong>"Agregar Asistente"</strong></p>
        </div>
        <ul class="asistentes-list">

        </ul>
    </div>
    <div class="mensajeria-content">
        <?php include "includes/mensajeria.php" ?>
        <button id="mainButton" class="main-button">
            <i class="acuarela acuarela-Mensajes"></i>
        </button>
    </div>
</main>
<div class="nofunction">
    <!-- <?php include "includes/mensajeria.php" ?> -->
    <button id="fab" class="fab" style="background-color: #EE74A8;">
        <!-- <i class="acuarela acuarela-24 fab-icon acuarela-Menu menu" id="fab-icon"></i> -->
        <!-- <i class="acuarela acuarela-Cancelar"></i> -->
        <i class="acuarela acuarela-Mensajes"></i>
    </button>
</div>
<?php include "includes/footer.php" ?>