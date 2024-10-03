<?php $classBody = "inscripcionesList";
include "includes/header.php" ?>
<main>
  <?php
  $mainHeaderTitle = "Niñxs agregados";
  $action = '<a href="/miembros/acuarela-app-web/agregar-ninx" class="btn btn-action-primary enfasis btn-big">Agregar niñxs</a>';
  include "templates/sectionHeader.php";
  ?>
  <div class="content">
    <div class="emptyElement">
      <h2>No hay Inscripciones creadas</h2>
      <p>Para agregar una inscripción, haz clic en el botón <strong>'Agregar niñxs'</strong></p>
    </div>

    <ul>
    </ul>
  </div>
  <div class="mensajeria-content">
    <?php include "includes/mensajeria.php" ?>

    <button id="mainButton" class="main-button">
      <i class="acuarela acuarela-Mensajes"></i>
    </button>

  </div>
</main>
<?php include "includes/footer.php" ?>