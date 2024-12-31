<?php $classBody = "social";
include "includes/header.php" ?>
<main>
  <?php
      $mainHeaderTitle = 'Social';
      $action = '<button class="btn btn-action-primary enfasis btn-big" id="openModalButton">Publicar</button>';
      $videoPath = 'videos/muro_social.mp4';
      include "templates/sectionHeader.php";
  ?>
  <div class="content">
    <div class="emptyElement">
      <h2>No hay post disponibles</h2>
      <p>Para compartir fotos con padres y asistentes, utiliza tu app de Acuarela para iPad.</p>
      <a href="https://apps.apple.com/us/app/acuarela-daycares/id1573321954" target="_blank" class="btn btn-action-primary enfasis btn-big">Descarga la app</a>
    </div>
    <section class="post-list"></section>
  </div>
  <!-- Modal para crear publicación -->
  <div id="postModal" class="modal">
    <div class="modal-content">
      <span class="close-button" id="closeModal">&times;</span>
      <h2>Crear publicación</h2>
      <textarea id="postContent" placeholder="Escribe algo..."></textarea>
      <div class="image-preview" id="imagePreview"></div>
      <button class="btn btn-secondary" id="uploadImageButton">
        <i class="acuarela acuarela-Importar acuarela-24 "></i>
      </button>
      <input type="file" id="imageInput" style="display: none;" accept="image/*" multiple />

      <div id="activitiesContainer">
        <h3>Vincular publicación a:</h3>
        <div class="activities-list" id="activitiesListContainer"></div>
      </div>

      <button class="btn btn-primary" id="publishButton">Publicar</button>
    </div>
  </div>
</main>

<div class="mensajeria-content">
  <?php include "includes/mensajeria.php" ?>

  <button id="mainButton" class="main-button">
    <i class="acuarela acuarela-Mensajes"></i>
  </button>
</div>
<?php include "boxes/tour.php" ?>
<?php include "includes/footer.php" ?>