<?php $classBody ="social"; include "includes/header.php" ?>
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
      <button class="btn btn-secondary" id="uploadImageButton">Subir Imágenes</button>
      <input type="file" id="imageInput" style="display: none;" accept="image/*" multiple />

      <div id="activitiesContainer">
        <h3>Vincular publicación a:</h3>
        <div class="activities-list" id="activitiesListContainer"></div>
      </div>

      <button class="btn btn-primary" id="publishButton">Publicar</button>
    </div>
  </div>
</main>
<div class="nofunction">
<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_68_17339)">
<path d="M34.64 27.4V31.84C34.64 33.8 33.04 35.44 31.04 35.44H19.56L20.96 37.88C21.36 38.56 20.84 39.44 20.08 39.44H14.72C13.92 39.44 13.44 38.56 13.84 37.88L15.24 35.44H3.76003C1.80003 35.44 0.160034 33.84 0.160034 31.84V13.4C0.160034 11.44 1.76003 9.79999 3.76003 9.79999H24.44V12.88H4.12003C3.60003 12.88 3.20003 13.28 3.20003 13.8V30.96C3.20003 31.48 3.60003 31.88 4.12003 31.88H30.72C31.24 31.88 31.64 31.48 31.64 30.96V27.36L34.64 27.4Z" fill="#FBFCFE"/>
<path d="M36.72 0.400024H29.36C27.56 0.400024 26.08 1.88002 26.08 3.68002V22.48C26.08 24.28 27.56 25.76 29.36 25.76H36.72C38.52 25.76 40 24.28 40 22.48V3.68002C40 1.88002 38.52 0.400024 36.72 0.400024ZM33.04 24.44C32.48 24.44 32.04 24 32.04 23.44C32.04 22.88 32.48 22.44 33.04 22.44C33.6 22.44 34.04 22.88 34.04 23.44C34.04 24 33.6 24.44 33.04 24.44ZM37.56 20.28C37.56 20.84 37.12 21.28 36.56 21.28H29.68C29.12 21.28 28.68 20.84 28.68 20.28V4.20002C28.68 3.64002 29.12 3.20002 29.68 3.20002H36.52C37.08 3.20002 37.52 3.64002 37.52 4.20002L37.56 20.28Z" fill="#FBFCFE"/>
</g>
<defs>
<clipPath id="clip0_68_17339">
<rect width="40" height="40" fill="white"/>
</clipPath>
</defs>
</svg>
<div class="message">
  <button type="button" id="closeMessage" onclick="fadeIn(document.querySelector('.message'));"><i class="acuarela acuarela-Cancelar"></i></button>
  <h3>
    <i class="acuarela acuarela-Informacion"></i>
    ¡Agrega una nueva foto!
  </h3>
  <p>
    Para compartir fotos con padres y asistentes, utiliza tu app de Acuarela para iPad.
  </p>
  <a href="https://apps.apple.com/us/app/acuarela-daycares/id1573321954" target="_blank">Descarga la app</a>
</div>
</div>
<?php include "boxes/tour.php" ?>
<?php include "includes/footer.php" ?>