<?php include "head.php" ?>
<?php
session_start();

// Obtener todas las suscripciones del usuario
$suscripciones = $_SESSION['user']->suscriptions;

// Crear un array con los IDs de las suscripciones
$suscripcionIds = [];
foreach ($suscripciones as $suscripcion) {
    $suscripcionIds[] = $suscripcion->id;
}

// Pasar los IDs a JavaScript
echo '<script>';
echo 'var suscripcionIds = ' . json_encode($suscripcionIds) . ';';
echo '</script>';
?>
<header>
    <button type="button" onclick="toggleMenu()">
        <i class="acuarela acuarela-Menu"></i>
        <i class="acuarela acuarela-Cancelar"></i>
    </button>
    <img src="img/logos/logotipo_invertido.svg" alt="LOGO" />
    <ul class="breadcrumb">
    <?php
    $section = isset($_GET['section']) ? $_GET['section'] : '';
    
    if ($section == 'muro-social') {
        echo '<li>Social</li>';
    } elseif ($section == 'inscripciones') {
        echo '<li>Inscripciones</li>';
    } elseif ($section == 'agregar-ninx') {
        echo '<li>Agregar Ninx</li>';
    } elseif ($section == 'asistencia') {
        echo '<li>Asistencia</li>';
    } elseif ($section == 'asistentes') {
        echo '<li>Asistentes</li>';
    } elseif ($section == 'grupos') {
        echo '<li>Grupos</li>';
    } elseif ($section == 'finanzas') {
        echo '<li>Finanzas</li>';
    } elseif ($section == 'inspeccion') {
        echo '<li>Inspección</li>';
    } elseif ($section == 'visitas') {
        echo '<li>Visitas</li>';
    }
    ?>
</ul>
    <div class="right">
        <ul>
        <!-- <li>
            <i class="acuarela acuarela-Notificaciones"></i
            ><small>Notificaciones</small>
        </li> -->
        <li class="logout">
            <a href=""><i class="acuarela acuarela-Cerrar_sesion"></i></a>
        </li>
        </ul>
    </div>
</header>
<aside>
    <div class="profile">
    <div class="image">
        <?=
        $_SESSION["userAll"]->photo ? '<img src="https://acuarelacore.com/api/'.$_SESSION["userAll"]->photo->url.'" alt="profilePhoto" />' : '<img src="img/placeholder.png" alt="profilePhoto" />'?>
    </div>
    <div class="profile__txt">
        <h2><?=$_SESSION["userAll"]->name?> <?=$_SESSION["userAll"]->lastname?></h2>
        <p><?=$_SESSION["userAll"]->acuarelauser->rols[0]->rol?></p>
        <p>Daycare: <strong id="daycareName"></strong></p>
    </div>
    </div>
    <nav>
    <a href="/miembros/acuarela-app-web/" class="<?=$_GET['activeTab'] == 0 ? 'active':''?>"><i class="acuarela acuarela-Anadir_reaccion"></i>Social</a>
    <a href="/miembros/acuarela-app-web/inscripciones" class="<?=$_GET['activeTab'] == 1 ? 'active':''?>"><i class="acuarela acuarela-Formulario"></i>Agregar niñxs</a>
    <a href="/miembros/acuarela-app-web/asistencia" class="<?=$_GET['activeTab'] == 2 ? 'active':''?>"><i class="acuarela acuarela-Asistencia"></i>Asistencia</a>
    <a href="/miembros/acuarela-app-web/asistentes" class="<?=$_GET['activeTab'] == 3 ? 'active':''?>"><i class="acuarela acuarela-Asistente"></i>Asistentes</a>
    <a href="/miembros/acuarela-app-web/grupos" class="<?=$_GET['activeTab'] == 4 ? 'active':''?>"><i class="acuarela acuarela-Grupo"></i>Grupos</a>
    <a href="javascript:;" id="lightbox-finanzas" class="<?=$_GET['activeTab'] == 5 ? 'active':''?>"><i class="acuarela acuarela-Finanzas"></i>Finanzas <div class="badge">PRO</div></a>
    <a href="/miembros/acuarela-app-web/inspeccion" class="<?=$_GET['activeTab'] == 6 ? 'active':''?>"><i class="acuarela acuarela-Pago"></i>Inspección</a>
    <!-- <a href="/miembros/acuarela-app-web/visitas" class="<?=$_GET['activeTab'] == 7 ? 'active':''?>"><i class="acuarela acuarela-Familia"></i>Visitas</a> -->
    <hr />
    <a href="/miembros/acuarela-app-web/configuracion" class="<?=$_GET['activeTab'] == 8 ? 'active':''?>">Configuración</a>

    </nav>
</aside>

