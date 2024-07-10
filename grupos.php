<?php $classBody ="grupos"; include "includes/header.php" ?>
<main>
  <?php
    $mainHeaderTitle = "Grupos" ;
    $action = '<a href="/miembros/acuarela-app-web/grupos/nuevo-grupo" class="btn btn-action-primary enfasis btn-big">Crear grupo</a>';
    include "templates/sectionHeader.php";
?>
  <div class="content">
    <div class="alertMessage">
      <i class="acuarela acuarela-Informacion"></i>
      <p> Has llegado al número máximo de grupos. Si tu daycare requiere más grupos contáctanos</p>
    </div>
    <div class="emptyElement">
        <h2>Aún no tienes asistentes creados</h2>
        <p>Actualmente, no has creado ningún asistente. Para comenzar, necesitas crear tu primer asistente. Haz clic en el siguiente botón</p>
        <a href="/miembros/acuarela-app-web/agregar-asistente" target="_blank" class="btn btn-action-primary enfasis btn-big">Crear asistente</a>
    </div>
    <ul class="list">
     
    </ul>
  </div>
</main>
<?php include "includes/footer.php" ?>