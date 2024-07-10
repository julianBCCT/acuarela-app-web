<?php $classBody ="asistente"; include "includes/header.php"; $asistente = $a->getAsistentes($_GET['id']); ?>
<script>
    let activities = <?=json_encode($asistente->childrenactivities)?>;
</script>
<main>
<?php
    $mainHeaderTitle = '<a href="/miembros/acuarela-app-web/asistentes" ><i class="acuarela acuarela-Flecha_izquierda"></i></a>'."{$asistente->name} {$asistente->lastname}" ;
    $action = '<a href="/miembros/acuarela-app-web/inspeccion" class="btn btn-action-primary enfasis btn-big"><i class="acuarela acuarela-Pago"></i>Generar informe</a>';
    include "templates/sectionHeader.php";
    // Crea un objeto DateTime desde la cadena ISO 8601
    $birthdate = new DateTime($asistente->birthdate);
    // Formatea la fecha al formato MM-DD-YYYY
    $birthdate_formateada = $birthdate->format('m-d-Y');
    // Crea un objeto DateTime desde la cadena ISO 8601
    $published_at = new DateTime($asistente->published_at);
    // Formatea la fecha al formato MM-DD-YYYY
    $published_at_formateada = $published_at->format('m-d-Y');
?>
    <div class="content">
        <div class="basicinfo">
            <div class="txt">
                <p><i class="acuarela acuarela-Evento"></i> <span>Fecha de nacimiento</span> <strong>
                        <?=$birthdate_formateada?>
                    </strong></p>
                <p><i class="acuarela acuarela-Calendario"></i> <span>Inscrito desde</span> <strong>
                        <?=$published_at_formateada?>
                    </strong></p>
                    <p><i class="acuarela acuarela-Localizacion"></i> <span>Dirección</span> <strong><?=$asistente->address->complement?> <?=$asistente->address->number?> <?=$asistente->address->street?></strong></p>
                    <p><i class="acuarela acuarela-Localizacion"></i> <span>Ciudad</span> <strong><?=$asistente->city?></strong></p>
                    <p><i class="acuarela acuarela-Nivel_educativo"></i> <span>Nivel educativo</span> <strong><?=$asistente->study?></strong></p>
                    <p><i class="acuarela acuarela-Telefono"></i> <span>Teléfono</span> <strong><?=$asistente->phone?></strong></p>
                    <p><i class="acuarela acuarela-Mensajes"></i> <span>E-mail</span> <strong><?=$asistente->mail?></strong></p>
            </div>
            <div class="photo">
                <img loading="lazy" class="lazyload" src="img/placeholder.png" data-src="https://acuarelacore.com/api/<?=$asistente->photo->url?>" alt="<?=$asistente->photo->url?>">
            </div>
        </div>
    </div>
</main>
<?php include "includes/footer.php" ?>