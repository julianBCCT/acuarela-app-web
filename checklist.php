<?php $classBody ="checklist"; include "includes/header.php";  ?>

<main>
    <?php
    $mainHeaderTitle = 'Administrador de Tareas' ;
    $action = '<button onclick="showDialogForm()" data-fancybox data-src="#createTask" class="btn btn-action-primary enfasis btn-big">Crear nueva tarea</button>';
    include "templates/sectionHeader.php";
    ?>


<div class="navtabs">
        <div class="navtab active" data-target="hoy">Vencen hoy</div>
        <div class="navtab" data-target="atrasadas">Atrasadas</div>
        <div class="navtab" data-target="todas">Todas</div>
        <div class="underline"></div>
    </div>
    <div class="content">
    <div id="hoy" class="tab-content active">


        <ul class="taskList">

        </ul>
    </div>
    <div id="atrasadas" class="tab-content ">
        <ul class="taskList">

        </ul>
    </div>
    <div id="todas" class="tab-content ">
        <ul class="taskList">

        </ul>
    </div>
    </div>
</main>
<div id="createTask"  style="display:none;max-width:500px;">
  <div class="lightbox-content">
    <h2 id="info-lightbox-title">Nueva Tarea</h2>
    <form action="">
        <span>
            <label for="">Nombre de la tarea</label>
            <input type="text" name="name" id="name">
        </span>
        <span>
                    <i class="acuarela acuarela-Evento"></i>
                    <span class="calendar">
                        <label for="name">Fecha de la tarea</label>
                        <input type="date" name="date" id="date" />
                         <span class="error-message"></span>
                    </span>
                     <span class="error-message"></span>
                </span>
        <span>
            <label for="">Asignado a</label>
            <select name="acuarelauser" id="acuarelauser">
                <option value="">Seleccionar asistente</option>
            </select>
        </span>
        <span>
            <label for="">Comentarios</label>
            <textarea name="commentarios" id="commentarios"></textarea>
        </span>
        

    </form>
  </div>
</div>
<?php include "includes/footer.php" ?>