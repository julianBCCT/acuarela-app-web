<?php $classBody ="kid_profile"; include "includes/header.php"; $kid = $a->getChildren($_GET['id']);
?>
<script>
    let activities = <?= json_encode($kid->childrenactivities) ?>;
    let kidData = <?= json_encode($kid) ?>;
</script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

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
        <div class="contentninx">
            <div class="contentcent">
                <div class="basicinfo">
                    <div class="txt">
                        <div class="txt_data">
                        <p><i class="acuarela acuarela-Evento"></i>
                                <span class="txt_infodata">
                                    <span>Fecha de nacimiento</span>
                                    <strong><?= $birthdate_formateada ?: 'No disponible' ?></strong>
                                </span>
                            </p>
                            <p><i class="acuarela acuarela-Calendario"></i>
                                <span class="txt_infodata">
                                    <span>Inscrito desde</span>
                                    <strong><?= $published_at_formateada ?: 'No disponible' ?></strong>
                                </span>
                            </p>
                            <p><i class="acuarela acuarela-Localizacion"></i>
                                <span class="txt_infodata">
                                    <span>Ciudad</span>
                                    <strong><?= $kid->city ?: 'No disponible' ?></strong>
                                </span>
                            </p>
                            <p><i class="acuarela acuarela-Telefono"></i>
                                <span class="txt_infodata">
                                    <span>Número Mamá</span>
                                    <strong><?= $kid->acuarelausers[0]->phone ?? 'No disponible' ?></strong>
                                </span>
                            </p>

                            <p><i class="acuarela acuarela-Mensajes"></i>
                                <span class="txt_infodata">
                                    <span>Correo Mamá</span>
                                    <strong><?= $kid->acuarelausers[0]->mail ?? 'No disponible' ?></strong>
                                </span>
                            </p>

                            <p><i class="acuarela acuarela-Telefono"></i>
                                <span class="txt_infodata">
                                    <span>Número Papá</span>
                                    <strong><?= $kid->acuarelausers[1]->phone ?? 'No disponible' ?></strong>
                                </span>
                            </p>

                            <p><i class="acuarela acuarela-Mensajes"></i>
                                <span class="txt_infodata">
                                    <span>Correo Papá</span>
                                    <strong><?= $kid->acuarelausers[1]->mail ?? 'No disponible' ?></strong>
                                </span>
                            </p>
                            <?php
                                // echo 'ID recibido: ' . htmlspecialchars($_GET['id']);
                                // echo '<pre>';
                                //     var_dump($kid);
                                // echo '</pre>';
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
                                <!-- <p><span class="hs-sep"><i class="acuarela acuarela-Checklist"></i> <span>Alergias: </span> </span>  <?=$kid->healthinfo->allergies?> </p> -->
                                <div class="saludcampos">
                                    <p class="hs-sep"><i class="acuarela acuarela-Checklist"></i> <span>Alergias:</span></p>
                                    <div class="saludcampos-JSON">
                                        <?php 
                                        $alergias = $kid->healthinfo->allergies ?? [];
                                        $alergiasFiltradas = array_filter($alergias, fn($a) => trim($a) !== '');
                                        if (empty($alergiasFiltradas)): ?>
                                            <p>Ninguna</p>
                                        <?php else: ?>
                                            <?php foreach ($alergiasFiltradas as $alergia): ?>
                                                <p><?= htmlspecialchars($alergia) ?></p>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="saludcampos">
                                    <p class="hs-sep"><i class="acuarela acuarela-Checklist"></i> <span>Asma: </span></p>
                                    <div class="saludcampos-JSON">
                                        <p><?= $kid->healthinfo->asthma == 1 ? 'Sí' : 'No' ?></p>
                                    </div>
                                </div>
                                <div class="saludcampos">
                                    <p class="hs-sep"><i class="acuarela acuarela-Checklist"></i> <span>Medicamentos:</span></p>
                                    <div class="saludcampos-JSON">
                                        <?php 
                                        $medicamentos = $kid->healthinfo->medicines ?? [];
                                        $medicamentosFiltrados = array_filter($medicamentos, fn($m) => trim($m) !== '');
                                        if (empty($medicamentosFiltrados)): ?>
                                            <p>Ninguno</p>
                                        <?php else: ?>
                                            <?php foreach ($medicamentosFiltrados as $med): ?>
                                                <p><?= htmlspecialchars($med) ?></p>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="saludcampos">
                                    <p class="hs-sep"><i class="acuarela acuarela-Checklist"></i> <span>Vacunas:</span></p>
                                    <div class="saludcampos-JSON">
                                        <?php 
                                        $vacunas = $kid->healthinfo->vacination ?? [];
                                        $vacunasFiltradas = array_filter($vacunas, fn($v) => trim($v) !== '');
                                        if (empty($vacunasFiltradas)): ?>
                                            <p>Ninguna</p>
                                        <?php else: ?>
                                            <?php foreach ($vacunasFiltradas as $vac): ?>
                                                <p><?= htmlspecialchars($vac) ?></p>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="saludcampos">
                                    <p class="hs-sep"><i class="acuarela acuarela-Checklist"></i> <span>Accidentes:</span></p>
                                    <div class="saludcampos-JSON">
                                        <?php 
                                        $accidentes = $kid->healthinfo->accidents ?? [];
                                        // Filtramos el array para eliminar valores vacíos ("" o null)
                                        $accidentesFiltrados = array_filter($accidentes, fn($a) => trim($a) !== '');
                                        if (empty($accidentesFiltrados)): ?>
                                            <p>Ninguno</p>
                                        <?php else: ?>
                                            <?php foreach ($accidentesFiltrados as $accidente): ?>
                                                <p><?= htmlspecialchars($accidente) ?></p>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="saludcampos">
                                    <p class="hs-sep"><i class="acuarela acuarela-Checklist"></i> <span>Salud física:</span></p>
                                    <div class="saludcampos-JSON">
                                        <p><?= !empty($kid->healthinfo->physical_health) ? $kid->healthinfo->physical_health : 'Ninguna' ?></p>
                                    </div>
                                </div>
                                <div class="saludcampos">
                                    <p class="hs-sep"><i class="acuarela acuarela-Checklist"></i> <span>Salud emocional:</span></p>
                                    <div class="saludcampos-JSON">
                                        <p><?= !empty($kid->healthinfo->emotional_health) ? $kid->healthinfo->emotional_health : 'Ninguna' ?></p>
                                    </div>
                                </div>
                                <div class="saludcampos">
                                    <p class="hs-sep"><i class="acuarela acuarela-Checklist"></i> <span>Sospecha de abuso: </span></p>
                                    <div class="saludcampos-JSON">
                                        <p><?= !empty($kid->healthinfo->suspected_abuse) ? $kid->healthinfo->suspected_abuse : 'Ninguna' ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="saludinfo-add">
                                <div class="saludunguentos">
                                    <div class="unguentosdesp">
                                        <h3 class="unguentostitle">Ungüentos autorizados</h3>
                                        <p class="ung-btn"><i class="iconung acuarela acuarela-Flecha_arriba"></i></p>
                                    </div>
                                    <div class="unguentoscontent show">
                                        <?php 
                                        $unguentos = $kid->healthinfo->ointments ?? [];
                                        $unguentosFiltrados = array_filter($unguentos, fn($u) => trim($u) !== '');
                                        if (empty($unguentosFiltrados)): ?>
                                            <p>Ninguno</p>
                                        <?php else: ?>
                                            <?php foreach ($unguentosFiltrados as $ung): ?>
                                                <p><?= htmlspecialchars($ung) ?></p>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="saludunguentos">
                                    <div class="unguentosdesp">
                                        <h3 class="unguentostitle">Datos del pediatra</h3>
                                        <p class="ung-btn"><i class="iconung acuarela acuarela-Flecha_arriba"></i></p>
                                    </div>
                                    <div class="unguentoscontent show">
                                        <p class="hs-sep3"><strong>Doctor: </strong> <?= !empty($kid->healthinfo->pediatrician) ? $kid->healthinfo->pediatrician : 'No agregados' ?> </p>
                                        <p class="hs-sep3"><strong>Teléfono: </strong> <?= !empty($kid->healthinfo->pediatrician_number) ? $kid->healthinfo->pediatrician_number : 'No agregados' ?> </p>
                                        <p class="hs-sep3"><strong>Correo: </strong> <?= !empty($kid->healthinfo->pediatrician_email) ? $kid->healthinfo->pediatrician_email : 'No agregados' ?> </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="saludinfoadd saludinfoadd-shadow" href="/miembros/acuarela-app-web/agregar-salud/<?= $kid->_id ?>"><i class="acuarela acuarela-Agregar"></i> Agregar datos de salud </a>

                        <div class="saludincidentes">
                            <h3 class="saludincidentes-title">Incidentes</h3>
                            <?php if (!empty($kid->healthinfo->incidents)) : ?>
                                <?php foreach ($kid->healthinfo->incidents as $index => $incident) : ?>
                                    <div class="incidentnino" id="incidentes">
                                        <div class="incidentnino-desp">
                                            <h4 class="h4">Incidente <?= $index + 1 ?></h4> <!-- Mostrará Incidente 1, Incidente 2, etc. -->
                                            <p class="iconincid"><i class="acuarela acuarela-Flecha_arriba"></i></p>
                                        </div>
                                        <div class="incidentinfo">
                                            <div class="incidentreport">
                                                <p> Reportado por <?= $incident->reported_for ?> </p>
                                                <!-- <p><i class="acuarela acuarela-Horario"></i> <?= date('H:i', strtotime($incident->reported_enh)) ?> </p> -->
                                                <p><i class="acuarela acuarela-Calendario"></i> <?= date('m-d-Y', strtotime($incident->reported_enf)) ?> </p>
                                                </div>
                                                <div class="incidentdetails">
                                                    <p class="incdet-p">
                                                        <span class="hs-sep2"><i class="acuarela acuarela-Ayuda"></i> <span>Tipo de incidente </span></span>
                                                        <span class="inc-text"><?= !empty($incident->incident_type) ? htmlspecialchars($incident->incident_type) : 'No registrado' ?></span>
                                                    </p>
                                                    <p class="incdet-p">
                                                        <span class="hs-sep2"><i class="acuarela acuarela-Informacion"></i> <span>Descripción </span></span>
                                                        <span class="inc-text"><?= !empty($incident->description) ? htmlspecialchars($incident->description) : 'No registrado' ?></span>
                                                    </p>
                                                    <p class="incdet-p">
                                                        <span class="hs-sep2"><i class="acuarela acuarela-Prioridad"></i> <span>Nivel de gravedad </span></span>
                                                        <span class="inc-text"><?= !empty($incident->gravedad) ? htmlspecialchars($incident->gravedad) : 'No registrado' ?></span>
                                                    </p>
                                                    <p class="incdet-p">
                                                        <span class="hs-sep2"><i class="acuarela acuarela-Advertencia"></i> <span>Temperatura </span></span>
                                                        <span class="inc-text"><?= isset($incident->temperature) && trim($incident->temperature) !== '' ? htmlspecialchars($incident->temperature) . ' °F' : 'No registrado' ?></span>
                                                    </p>
                                                    <p class="incdet-p">
                                                        <span class="hs-sep2"><i class="acuarela acuarela-Salud"></i> <span>Estado de salud </span></span>
                                                        <span class="inc-text"><?= !empty($incident->statehealth) ? htmlspecialchars($incident->statehealth) : 'No registrado' ?></span>
                                                    </p>
                                                    <p class="incdet-p">
                                                        <span class="hs-sep2"><i class="acuarela acuarela-Informacion"></i> <span>Acciones tomadas </span></span>
                                                        <span class="inc-text"><?= !empty($incident->actions_taken) ? htmlspecialchars($incident->actions_taken) : 'No registrado' ?></span>
                                                    </p>
                                                    <p class="incdet-p">
                                                        <span class="hs-sep2"><i class="acuarela acuarela-Informacion"></i> <span>Acciones esperadas </span></span>
                                                        <span class="inc-text"><?= !empty($incident->actions_expected) ? htmlspecialchars($incident->actions_expected) : 'No registrado' ?></span>
                                                    </p>
                                                </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <p>No hay incidentes registrados.</p>
                            <?php endif; ?>
                            <a class="saludinfoadd" href="/miembros/acuarela-app-web/agregar-reporte/<?= $kid->_id ?>"><i class="acuarela acuarela-Agregar"></i> Agregar nuevo reporte </a>
                        </div>        
                    </div>
                </div>

                <div id="health_check" class="tab-content">
                    <div class="health-calendar">
                        <div class="header">
                            <select id="year-select"></select>                   
                            <select id="month-select"></select>
                        </div>
                        <!-- Contenedor del calendario -->
                        <div id="calendar-container">
                            <table id="calendar">
                                <thead>
                                    <tr>
                                        <th>D</th>
                                        <th>L</th>
                                        <th>M</th>
                                        <th>M</th>
                                        <th>J</th>
                                        <th>V</th>
                                        <th>S</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Las fechas se generarán dinámicamente -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="health-buttoms">
                        <button id="btnView-reporte" class="btn btn-action-secondary enfasis btn-big btn-disable"> Ver reporte </button>   
                        <button id="btnAgregar-reporte" class="btn btn-action-secondary enfasis btn-big btn-disable"> Agregar reporte </button>           
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
        </div>
    </div>
</main>
<?php include "includes/footer.php" ?>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        //==> Calendario del HEALTH CHECK
        const calendar = document.querySelector('#calendar tbody');
        const monthSelect = document.querySelector('#month-select');
        const yearSelect = document.querySelector('#year-select');

        const today = new Date();
        let currentYear = today.getFullYear();
        let currentMonth = today.getMonth();

        // Nombres de los meses
        const months = [
            'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
            'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
        ];

        // Generar las opciones del selector de mes
        months.forEach((month, index) => {
            const option = document.createElement('option');
            option.value = index;
            option.textContent = month;
            if (index === currentMonth) option.selected = true;
            monthSelect.appendChild(option);
        });

        // Generar las opciones del selector de año (10 años hacia atrás y adelante)
        for (let i = currentYear - 10; i <= currentYear + 10; i++) {
            const option = document.createElement('option');
            option.value = i;
            option.textContent = i;
            if (i === currentYear) option.selected = true;
            yearSelect.appendChild(option);
        }

        function generateCalendar(year, month) {
            calendar.innerHTML = ''; // Limpia el calendario

            const firstDay = new Date(year, month, 1).getDay(); // Día de la semana del primer día del mes
            const daysInMonth = new Date(year, month + 1, 0).getDate(); // Cantidad de días en el mes
            const daysInPrevMonth = new Date(year, month, 0).getDate(); // Días en el mes anterior

            let date = 1;
            let nextMonthDate = 1;
            
            for (let i = 0; i < 6; i++) {
                const row = document.createElement('tr');
                let hasDays = false; // Para evitar agregar filas innecesarias

                for (let j = 0; j < 7; j++) {
                    const cell = document.createElement('td');

                    if (i === 0 && j < firstDay) {
                        // Días del mes anterior (en gris)
                        const dayNumber = daysInPrevMonth - (firstDay - j - 1);
                        cell.appendChild(createDayCell(dayNumber, 'prev-month-cell', true));
                    } else if (date > daysInMonth) {
                        // Días del siguiente mes (en gris, pero solo hasta completar la semana)
                        cell.appendChild(createDayCell(nextMonthDate, 'next-month-cell', true));
                        nextMonthDate++;
                    } else {
                        // Días del mes actual
                        const dayCell = createDayCell(date);
                        if (date === today.getDate() && year === today.getFullYear() && month === today.getMonth()) {
                            dayCell.style.backgroundColor = '#0cb5c3'; // Resalta el día actual
                            dayCell.style.color = 'white'; 
                            const dayTextParagraphs = dayCell.querySelectorAll('.day-text p');
                            dayTextParagraphs.forEach(p => {
                                p.style.color = 'white';
                            });
                        }
                        cell.appendChild(dayCell);
                        date++;
                        hasDays = true;
                    }
                    row.appendChild(cell);
                }
                // Solo agrega la fila si tiene días útiles
                if (hasDays || i === 0) {
                    calendar.appendChild(row);
                } else {
                    break;
                }
            }
        }

        // Función para crear un div con el número del día y los textos "Hola" y "Vamos"
        function createDayCell(dayNumber, extraClass = '', isGrayed = false) {
            const wrapper = document.createElement('div');
            wrapper.classList.add('day-wrapper');
            if (extraClass) {
                wrapper.classList.add(extraClass);
            }
            // Formatear la fecha correctamente (YYYY-MM-DD)
            const formattedDate = `${currentYear}-${(currentMonth + 1).toString().padStart(2, '0')}-${dayNumber.toString().padStart(2, '0')}`;
            wrapper.setAttribute('data-fecha', formattedDate);

            const dayDiv = document.createElement('div');
            dayDiv.textContent = dayNumber.toString().padStart(2, '0');  // Formato con 2 dígitos
            dayDiv.classList.add('day-number');
            wrapper.appendChild(dayDiv);

            // Si el día está gris (fuera de los días actuales del mes)
            if (!isGrayed) {
                const textDiv = document.createElement('div');
                textDiv.classList.add('day-text');

                const healthTempt = kidData.healthinfo.healthcheck.find(entry => entry.daily_fecha === formattedDate);
                const pTemp = document.createElement('p');
                pTemp.textContent = healthTempt ? `${healthTempt.temperature}°F` : '--';

                const pGuion = document.createElement('p');
                pGuion.textContent = '-';

                const healthReport = kidData.healthinfo.healthcheck.find(entry => entry.daily_fecha === formattedDate);
                const pReport = document.createElement('p');
                if (healthReport) {
                    if (healthReport.report === "Ninguno") {
                        pReport.textContent = "OK";
                    } else if (typeof healthReport.report === 'string') {
                        const reportCode = healthReport.report.split('-')[0];
                        pReport.textContent = reportCode;
                    } else {
                        pReport.textContent = "--";
                    }
                } else {
                    pReport.textContent = "--"; // Si no hay datos, mostrar "--"
                }

                textDiv.appendChild(pTemp);
                // textDiv.appendChild(pGuion);
                textDiv.appendChild(pReport);
                wrapper.appendChild(textDiv);
            } else {
                // Si el día es gris, solo agregamos el contenedor vacío
                const textDiv = document.createElement('div');
                textDiv.classList.add('day-text');
                wrapper.appendChild(textDiv);
                }

            return wrapper;
        }


        // Evento para actualizar el calendario al cambiar mes o año
        monthSelect.addEventListener('change', function () {
            currentMonth = parseInt(this.value, 10);
            generateCalendar(currentYear, currentMonth);
        });

        yearSelect.addEventListener('change', function () {
            currentYear = parseInt(this.value, 10);
            generateCalendar(currentYear, currentMonth);
        });

        // Generar el calendario inicial
        generateCalendar(currentYear, currentMonth);

        const tds = document.querySelectorAll("#calendar td");
        const btnAddreport = document.getElementById("btnAgregar-reporte");
        const btnViewreport = document.getElementById("btnView-reporte");

        // Deshabilitar los botones al inicio
        btnAddreport.disabled = false;
        btnAddreport.classList.add("active"); 
        btnViewreport.disabled = true;

        // Pintar de celeste todo los <td> con fechas que existen en kidData
        tds.forEach(td => {
            const dayWrapper = td.querySelector(".day-wrapper");
            if (!dayWrapper) return;
            const fechaTd = dayWrapper.getAttribute("data-fecha");
            if (!fechaTd) return;
            // Verificar si la fecha está en kidData.healthinfo.healthcheck
            const existeFecha = kidData.healthinfo.healthcheck.some(entry => entry.daily_fecha === fechaTd);

            if (existeFecha) {
                td.classList.add("has-data"); // Agregar una clase para identificar los td con fecha
                td.style.backgroundColor = "var(--fondo2)";
            }
            // Aplicar hover manualmente
            td.addEventListener("mouseenter", function () {
                if (!this.classList.contains("active")) {
                    this.style.backgroundColor = "var(--cielo_tenue)";
                }
            });
            td.addEventListener("mouseleave", function () {
                if (!this.classList.contains("active")) {
                    this.style.backgroundColor = this.classList.contains("has-data") ? "#d7f6f9" : "";
                }
            });
        });


        tds.forEach(td => {
            td.addEventListener("click", function () {
                // Remover la clase 'active' de todos los td
                tds.forEach(cell => {
                    cell.classList.remove("active");
                    if (cell.classList.contains("has-data")) {
                        cell.style.backgroundColor = "var(--fondo2)"; // Volver a celeste si tiene datos
                    } else {
                        cell.style.backgroundColor = ""; // Restaurar a vacío si no tiene datos
                    }
                });

                this.classList.add("active");  // Agregar la clase 'active' al td clickeado

                // Cambiar color solo si tiene datos
                if (this.classList.contains("has-data")) {
                    this.style.backgroundColor = "var(--cielo_tenue)"; // Naranja cuando se selecciona
                } else {
                    this.style.backgroundColor = "var(--cielo_tenue)"; // Azul claro si no tiene datos
                }

                // Obtener la fecha del `day-wrapper` dentro del `td`
                const dayWrapper = this.querySelector(".day-wrapper");
                let fechaSeleccionada = null;
                if (dayWrapper) {
                    fechaSeleccionada = dayWrapper.getAttribute("data-fecha");
                }
                
                // Buscar la fecha en `kidData.healthinfo.healthcheck`
                const existeFecha = kidData.healthinfo.healthcheck.some(entry => entry.daily_fecha === fechaSeleccionada);

                // Habilitar o deshabilitar los botones según si la fecha existe
                btnAddreport.disabled = false;
                btnAddreport.classList.add("active"); 
                                
                if (existeFecha) {
                    btnViewreport.disabled = false;
                    btnViewreport.classList.add("active"); 
                    btnViewreport.setAttribute("data-fecha", fechaSeleccionada); // Guardar la fecha en el botón
                    btnAddreport.disabled = true;
                    btnAddreport.classList.remove("active"); 
                } else {
                    btnViewreport.disabled = true;
                    btnViewreport.classList.remove("active"); 
                    btnViewreport.removeAttribute("data-fecha");
                    btnAddreport.disabled = false;
                    btnAddreport.classList.add("active"); 
                    btnAddreport.setAttribute("data-fecha", fechaSeleccionada); // Guardar la fecha en el botón
                }
            });
        });

        // Evento para mostrar el Lightbox de agregar reporte
        btnAddreport.addEventListener("click", function () {
            if (!btnAddreport.disabled) {
                const fechaSeleccionada2 = btnAddreport.getAttribute("data-fecha");
                if (fechaSeleccionada2) {
                    showLightboxAddHealthCkeck(fechaSeleccionada2);
                }
                showLightboxAddHealthCkeck(fechaSeleccionada2);
            }
        });

        // Evento para mostrar el Lightbox de ver reporte
        btnViewreport.addEventListener("click", function () {
            if (!btnViewreport.disabled) {
                const fechaSeleccionada = btnViewreport.getAttribute("data-fecha");
                if (fechaSeleccionada) {
                    showLightboxViewHealthCkeck(fechaSeleccionada);
                }
            }
        });
    });

</script>