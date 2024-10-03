<?php $classBody = "asistencia";
include "includes/header.php"; ?>
<main>
    <?php
    $mainHeaderTitle = "Asistencia";
    $action = '<a href="/miembros/acuarela-app-web/inspeccion" class="btn btn-action-primary enfasis btn-big"><i class="acuarela acuarela-Pago"></i>Generar informe</a>';
    include "templates/sectionHeader.php";
    ?>
    <div class="content">
        <?php
        // Define los nombres de los meses en español
        $meses = [
            1 => 'Enero',
            2 => 'Febrero',
            3 => 'Marzo',
            4 => 'Abril',
            5 => 'Mayo',
            6 => 'Junio',
            7 => 'Julio',
            8 => 'Agosto',
            9 => 'Septiembre',
            10 => 'Octubre',
            11 => 'Noviembre',
            12 => 'Diciembre'
        ];

        // Crea un objeto DateTime para la fecha deseada
        $fecha = new DateTime();
        $fecha->modify('-1 day'); // Agregar un día
        // Obtiene el día, mes y año
        $dia = $fecha->format('d');
        $mes = $meses[(int)$fecha->format('m')];
        $anio = $fecha->format('Y');

        // Forma la fecha en el formato deseado
        $fecha_formateada = "$mes $dia, $anio";
        ?>
        <h2>
            <?= $fecha_formateada ?>
        </h2>
        <div class="info">
            <i class="acuarela acuarela-Informacion"></i>
            <p>
                Hacer clic al niño y selecciona la persona que lo entrega
                o lo recoge
            </p>
        </div>
        <h3>¿Quiénes están en el daycare?</h3>
        <p class="emptyindaycare">Aún no has ingresado ningún niño a tu Daycare, realiza el primer registro del día.</p>
        <ul class="indaycare"></ul>
        <hr />
        <h3>¿Quiénes están en casa?</h3>
        <p class="emptyinhome">Todos los niños se encuentran contigo en el Daycare. No olvides registrar la salida y entregarlo al
            responsable
            correspondiente.</p>
        <ul class="inhome"></ul>
        <hr />
        <h3>¿Quiénes están inactivos?</h3>
        <ul class="inactive"></ul>
    </div>
    <div class="mensajeria-content">
        <?php include "includes/mensajeria.php" ?>
        <button id="mainButton" class="main-button">
            <i class="acuarela acuarela-Mensajes"></i>
        </button>
    </div>
</main>
<?php include "includes/footer.php" ?>