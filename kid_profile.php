<?php $classBody ="kid_profile"; include "includes/header.php"; $kid = $a->getChildren($_GET['id']); ?>
<script>
    let activities = <?= json_encode($kid -> childrenactivities) ?>;
</script>
<main>
    <?php
    $mainHeaderTitle = "{$kid->name} {$kid->lastname}" ;
    $action = '<a href="/miembros/acuarela-app-web/inspeccion" class="btn btn-action-primary enfasis btn-big"><i class="acuarela acuarela-Pago"></i>Generar informe</a>';
    include "templates/sectionHeader.php";
    // Crea un objeto DateTime desde la cadena ISO 8601
    $birthdate = new DateTime($kid->birthdate);
    // Formatea la fecha al formato MM-DD-YYYY
    $birthdate_formateada = $birthdate->format('m-d-Y');
    // Crea un objeto DateTime desde la cadena ISO 8601
    $published_at = new DateTime($kid->published_at);
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
                <p><i class="acuarela acuarela-Localizacion"></i> <span>Ciudad</span> <strong><?=$kid->city?></strong>
                </p>
            </div>
            <div class="photo">
                <?php
                $photoUrl = isset($kid->photo) ? 'https://acuarelacore.com/api/' . $kid->photo->formats->small->url : null;
                $gender = $kid->gender;

                if ($photoUrl) {
                    echo "<img loading='lazy' class='lazyload' src='img/placeholder.png' data-src='$photoUrl' alt='{$kid->name}'>";
                } else {
                    if ($gender === "Masculino") {
                        echo '<img src="img/mal.png" alt="">';
                    } elseif ($gender === "Femenino") {
                        echo '<img src="img/fem.png" alt="">';
                    } elseif ($gender === "X") {
                        echo '<img src="img/Nonbinary.png" alt="">';
                    }
                }
              ?>
            </div>
        </div>
        <div class="navtabs">
            <div class="navtab active" data-target="familia">Familia</div>
            <div class="navtab" data-target="actividades">Actividades</div>
            <div class="navtab" data-target="pagos">Pagos</div>
            <!-- <div class="navtab" data-target="registro">Registro</div> -->
            <div class="navtab " data-target="Adjuntos">Adjuntos</div>
            <div class="underline"></div>
        </div>
        <div id="familia" class="tab-content active">
            <h3>Padres</h3>
            <ul>
                <?php 
                    for ($i=0; $i < count($kid->acuarelausers); $i++) { 
                        $parent = $kid->acuarelausers[$i];
                ?>
                <li>
                    <div class="image">
                        <?= $parent->photo
                      ? "<img src='https://acuarelacore.com/api/{$parent->photo->formats->small->url}' alt='{$parent->name}'>"
                      : "<i class='acuarela acuarela-Camara'></i>" ?>


                    </div>
                    <?php if(  $parent->is_principal){ ?>
                    <i class="acuarela acuarela-Estrella"></i>
                    <?php } ?>
                    <span class="name"><?=$parent->name?> <?=$parent->lastname?></span>
                </li>
                <?php } ?>
            </ul>
        </div>
        <div id="actividades" class="tab-content">
            <div class="actividadescontainer">
                <div class="header">
                    <button id="prev-month" class="nav-button">«</button>
                    <button id="prev-day" class="nav-button">‹</button>
                    <h2 id="date-display">Enero 22</h2>
                    <button id="next-day" class="nav-button">›</button>
                    <button id="next-month" class="nav-button">»</button>
                </div>
                <div id="activities-list" class="activities-list">
                    <!-- Activities will be injected here -->
                </div>
                <div id="no-activities" class="no-activities">No hay actividades registradas</div>
            </div>
        </div>
        <div id="pagos" class="tab-content">
            <ul>
                <?php 
            for ($i=0; $i < count($kid->movements); $i++) { 
                $pay = $kid->movements[$i];
                ?>
                <li>
                    <h4><?=$pay->name?></h4>
                    <span class="status" style="color:<?=$pay->status ? "#3fb072"
                    : "#f5aa16"?>;">
                        <?=$pay->status ? "PAGO APROBADO" : "PAGO PENDIENTE"?>
                    </span>
                    <span class="date">
                        <?php
                        // Crea un objeto DateTime desde la cadena ISO 8601
                        $payDate = new DateTime($pay->date);
                        // Formatea la fecha al formato MM-DD-YYYY
                        $payDate_formateada = $payDate->format('m-d-Y');
                        echo $payDate_formateada;
                        ?>
                    </span>
                    <span class="amount">
                        $<?=$pay->amount?>
                    </span>
                </li>
                <?php 
            }
            ?>

            </ul>
        </div>
        <!-- <div id="registro" class="tab-content"></div> -->
        <div id="Adjuntos" class="tab-content ">
        <ul>
                <?php 
            for ($i=0; $i < count($kid->files); $i++) { 
                $file = $kid->files[$i];
                ?>
                <li>
                    <a href="https://acuarelacore.com/api<?=$file->file->url?>">
                        <i class="acuarela acuarela-Nota"></i>
                        <h4><?=$file->name?></h4>
                    </a>
                </li>
                <?php 
            }
            ?>

            </ul>
        </div>
    </div>
</main>
<?php include "includes/footer.php" ?>