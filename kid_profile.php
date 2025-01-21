<?php $classBody ="kid_profile"; include "includes/header.php"; $kid = $a->getChildren($_GET['id']);
?>
<script>
    let activities = <?= json_encode($kid->childrenactivities) ?>;
    let kidData = <?= json_encode($kid) ?>;
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
                <div class="txt_data">
                    <p><i class="acuarela acuarela-Evento"></i> <span>Fecha de nacimiento</span> <strong>
                            <?=$birthdate_formateada?>
                        </strong></p>
                    <p><i class="acuarela acuarela-Calendario"></i> <span>Inscrito desde</span> <strong>
                            <?=$published_at_formateada?>
                        </strong></p>
                    <p><i class="acuarela acuarela-Localizacion"></i> <span>Ciudad</span> <strong><?=$kid->city?></strong>
                    </p>
                    <p><i class="acuarela acuarela-Telefono"></i> <span>Número Mamá</span> <strong><?=$kid->acuarelausers[0]->phone?></strong>
                    </p>
                    <p><i class="acuarela acuarela-Mensajes"></i> <span>Correo Mamá</span> <strong><?=$kid->acuarelausers[0]->mail?></strong>
                    </p>
                    <p><i class="acuarela acuarela-Telefono"></i> <span>Número Papá</span> <strong><?=$kid->acuarelausers[1]->phone?></strong>
                    </p>
                    <p><i class="acuarela acuarela-Mensajes"></i> <span>Correo Papá</span> <strong><?=$kid->acuarelausers[1]->mail?></strong>
                    </p>

                    <?php
                        echo 'ID recibido: ' . htmlspecialchars($_GET['id']);
                        echo '<pre>';
                            var_dump($kid);
                        echo '</pre>';
                    ?>
                </div>
                <button class="emergency_contact" href="javascript:;" id="lightbox-emergencycontact">Contacto de Emergencia</button>
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
            <div class="navtab" data-target="salud">Salud</div>
            <div class="navtab" data-target="health_check">Health Check</div>
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
            <h3>Responsables</h3>
            <ul>
                <?php 
                    for ($i=0; $i < count($kid->guardians); $i++) { 
                        $guardian = $kid->guardians[$i];
                ?>
                <li>
                    <div class="image">
                        <?= isset($guardian->photo) && isset($guardian->photo->formats->small->url)
                        ? "<img src='https://acuarelacore.com/api/{$guardian->photo->formats->small->url}' alt='{$guardian->guardian_name}'>"
                        : "<i class='acuarela acuarela-Camara'></i>" ?>
                    </div>
                    <?php if (isset($guardian->guardian_emergency) && $guardian->guardian_emergency) { ?>
                    <i class="acuarela acuarela-Estrella"></i>
                    <?php } ?>
                    <span class="name"><?=$guardian->guardian_name?> <?=$guardian->guardian_lastname?></span>
                </li>
                <?php } ?>
            </ul>
        </div>

        <div id="salud" class="tab-content">
            <div class="saludcontainer">
                <div class="saludinfo">
                    <div class="saludhistorial">
                        <h3>Historial de salud</h3>
                        <p><span class="hs-sep"><i class="acuarela acuarela-Checklist"></i> <span>Alergias: </span> </span>  Hola </p>
                        <p><span class="hs-sep"><i class="acuarela acuarela-Checklist"></i> <span>Asma: </span> </span>  Hola </p>
                        <p><span class="hs-sep"><i class="acuarela acuarela-Checklist"></i> <span>Medicamentos: </span> </span>  Hola </p>
                        <p><span class="hs-sep"><i class="acuarela acuarela-Checklist"></i> <span>Vacunas: </span> </span>  Hola </p>
                        <p><span class="hs-sep"><i class="acuarela acuarela-Checklist"></i> <span>Otras:: </span> </span>  Hola </p>
                    </div>
                    <div class="saludinfo-add">
                        <div class="saludunguentos">
                            <h3>Ungüentos autorizados</h3>
                            <p>Bloqueador solar</p>
                            <p>Repelente de insectos</p>
                        </div>
                        <div class="saludunguentos">
                            <h3>Información</h3>
                            <p><strong>Doctor: </strong>Nombre del doctor</p>
                            <p><strong>Telefono: </strong>0000000000</p>
                            <p><strong>Correo: </strong>doctor@gmail.com</p>
                        </div>
                    </div>
                </div>
                <div class="saludinfoadd saludinfoadd-shadow">
                    <a href="#"><i class="acuarela acuarela-Agregar"></i> Agregar datos de salud </a>
                </div>
                <div class="saludincidentes">
                    <h3>Incidentes</h3>
                    <div class="incidentnino" id="incidentes">
                        <div class="incidentnino-desp">
                            <h4>Incidente 1</h4>
                            <p class="iconincid"><i class="acuarela acuarela-Flecha_arriba"></i></p>
                        </div>
                        <div class="incidentinfo">
                            <div class="incidentreport">
                                <p>Reportado por Nancy Dominguez</p>
                                <p><i class="acuarela acuarela-Horario"></i> 10:00 AM</p>
                                <p><i class="acuarela acuarela-Calendario"></i> 16/01/2025</p>
                            </div>
                            <div class="incidentdetails">
                                <p><span class="hs-sep"><i class="acuarela acuarela-Informacion"></i> <span>Descripción </span></span> Presenta dolor de estomago</p>
                                <p><span class="hs-sep"><i class="acuarela acuarela-Prioridad"></i> <span>Nivel de gravedad </span></span> (leve, moderado, grave)</p>
                                <p><span class="hs-sep"><i class="acuarela acuarela-Advertencia"></i> <span>Temperatura </span></span> 32 °C </p>
                                <p><span class="hs-sep"><i class="acuarela acuarela-Salud"></i> <span>Estado de salud </span></span> Texto...</p>
                                <p><span class="hs-sep"><i class="acuarela acuarela-Informacion"></i> <span>Acciones tomadas </span></span> Se llamo a los padres y recogieron a la niña al daycare</p>
                                <p><span class="hs-sep"><i class="acuarela acuarela-Informacion"></i> <span>Acciones esperadas </span></span> El padre o acudiente recoja al niño</p>
                            </div>
                        </div>
                    </div>
                    <div class="saludinfoadd">
                        <a href="#"><i class="acuarela acuarela-Agregar"></i> Agregar nuevo reporte </a>
                    </div>
                    
                </div>
                
            </div>
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