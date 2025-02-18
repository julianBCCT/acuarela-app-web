<?php $classBody ="agregarsalud"; include "includes/header.php"; $kid = $a->getChildren($_GET['id']);
?>
<script>
    let kidData = <?= json_encode($kid) ?>;
</script>
<main>
    <?php
    $mainHeaderTitle = "{$kid->name} {$kid->lastname}" ;
    // $action = '<a href="/miembros/acuarela-app-web/inspeccion" class="btn btn-action-primary enfasis btn-big"><i class="acuarela acuarela-Pago"></i>Generar informe</a>';
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
    <form id="healthInfoForm" method="POST">
        <div class="content">
            <div class="contentninx">
                <fieldset class="fieldsalud">
                    <h2>Reporte de incidentes o sospecha de abusos </h2>
                    <div class="sectionsalud">
                        <h3 class="h3salud">Reportado por: </h3>
                        <div class="decorative-line"></div>

                        <span class="input-group">
                            <i class="saludicon acuarela acuarela-Usuario"></i>
                            <label class="labelpediatra" for="reportado_por">Reportado por: </label>
                            <input type="text" placeholder="Describe los síntomas" name="reportado_por" id="reportado_por" 
                                   value="<?= isset($kid->healthinfo->incidents->reported_for) ? $kid->healthinfo->incidents->reported_for : "" ?>" required>
                            <span class="error-message"></span>
                        </span>

                        <span class="input-group">
                            <i class="saludicon acuarela acuarela-Ayuda"></i>
                            <label class="labelpediatra" for="tipo-incidente">Tipo de incidente</label>
                            <select name="tipo-incidente" id="tipo-incidente" required>
                                <option value="" disabled <?= empty($kid->healthinfo->incidents->incident_type) ? 'selected' : '' ?>>Síntomas de enfermedad</option>
                                <option value="Fiebre" <?= isset($kid->healthinfo->incidents->incident_type) && $kid->healthinfo->incidents->incident_type == "Fiebre" ? 'selected' : '' ?>>Fiebre</option>
                                <option value="Tos persistente" <?= isset($kid->healthinfo->incidents->incident_type) && $kid->healthinfo->incidents->incident_type == "Tos persistente" ? 'selected' : '' ?>>Tos persistente</option>
                                <option value="Congestión nasal" <?= isset($kid->healthinfo->incidents->incident_type) && $kid->healthinfo->incidents->incident_type == "Congestión nasal" ? 'selected' : '' ?>>Congestión nasal</option>
                                <option value="Dolor de garganta" <?= isset($kid->healthinfo->incidents->incident_type) && $kid->healthinfo->incidents->incident_type == "Dolor de garganta" ? 'selected' : '' ?>>Dolor de garganta</option>
                                <option value="Dificultad para respirar" <?= isset($kid->healthinfo->incidents->incident_type) && $kid->healthinfo->incidents->incident_type == "Dificultad para respirar" ? 'selected' : '' ?>>Dificultad para respirar</option>
                                <option value="Vómitos" <?= isset($kid->healthinfo->incidents->incident_type) && $kid->healthinfo->incidents->incident_type == "Vómitos" ? 'selected' : '' ?>>Vómitos</option>
                                <option value="Diarrea" <?= isset($kid->healthinfo->incidents->incident_type) && $kid->healthinfo->incidents->incident_type == "Diarrea" ? 'selected' : '' ?>>Diarrea</option>
                                <option value="Erupción cutánea" <?= isset($kid->healthinfo->incidents->incident_type) && $kid->healthinfo->incidents->incident_type == "Erupción cutánea" ? 'selected' : '' ?>>Erupción cutánea</option>
                                <option value="Caída o golpe" <?= isset($kid->healthinfo->incidents->incident_type) && $kid->healthinfo->incidents->incident_type == "Caída o golpe" ? 'selected' : '' ?>>Caída o golpe</option>
                                <option value="Sangrado (herida leve)" <?= isset($kid->healthinfo->incidents->incident_type) && $kid->healthinfo->incidents->incident_type == "Sangrado (herida leve)" ? 'selected' : '' ?>>Sangrado (herida leve)</option>
                                <option value="Reacción alérgica" <?= isset($kid->healthinfo->incidents->incident_type) && $kid->healthinfo->incidents->incident_type == "Reacción alérgica" ? 'selected' : '' ?>>Reacción alérgica</option>
                                <option value="Picadura de insecto" <?= isset($kid->healthinfo->incidents->incident_type) && $kid->healthinfo->incidents->incident_type == "Picadura de insecto" ? 'selected' : '' ?>>Picadura de insecto</option>
                                <option value="Fractura o esguince" <?= isset($kid->healthinfo->incidents->incident_type) && $kid->healthinfo->incidents->incident_type == "Fractura o esguince" ? 'selected' : '' ?>>Fractura o esguince</option>
                                <option value="Quemadura leve" <?= isset($kid->healthinfo->incidents->incident_type) && $kid->healthinfo->incidents->incident_type == "Quemadura leve" ? 'selected' : '' ?>>Quemadura leve</option>
                                <option value="Ingestión de objeto extraño" <?= isset($kid->healthinfo->incidents->incident_type) && $kid->healthinfo->incidents->incident_type == "Ingestión de objeto extraño" ? 'selected' : '' ?>>Ingestión de objeto extraño</option>
                                <option value="Asfixia (obstrucción leve)" <?= isset($kid->healthinfo->incidents->incident_type) && $kid->healthinfo->incidents->incident_type == "Asfixia (obstrucción leve)" ? 'selected' : '' ?>>Asfixia (obstrucción leve)</option>
                                <option value="Mareos o desmayo" <?= isset($kid->healthinfo->incidents->incident_type) && $kid->healthinfo->incidents->incident_type == "Mareos o desmayo" ? 'selected' : '' ?>>Mareos o desmayo</option>
                                <option value="Convulsiones" <?= isset($kid->healthinfo->incidents->incident_type) && $kid->healthinfo->incidents->incident_type == "Convulsiones" ? 'selected' : '' ?>>Convulsiones</option>
                                <option value="Síntomas de deshidratación" <?= isset($kid->healthinfo->incidents->incident_type) && $kid->healthinfo->incidents->incident_type == "Síntomas de deshidratación" ? 'selected' : '' ?>>Síntomas de deshidratación</option>
                                <option value="Other" <?= isset($kid->healthinfo->incidents->incident_type) && $kid->healthinfo->incidents->incident_type == "Other" ? 'selected' : '' ?>>Other</option>
                            </select>
                            <span class="error-message"></span>
                        </span>


                        <span class="input-group">
                            <i class="saludicon acuarela acuarela-Informacion"></i>
                            <label class="labelpediatra" for="descripcion">Descripción</label>
                            <input type="text" placeholder="Describe los síntomas" name="descripcion" id="descripcion" 
                                   value="<?= isset($kid->healthinfo->incidents->description) ? $kid->healthinfo->incidents->description : "" ?>" required>
                            <span class="error-message"></span>
                        </span>

                        <span class="input-group">
                            <i class="saludicon acuarela acuarela-Advertencia"></i>
                            <label class="labelpediatra" for="temperatura">Temperatura</label>
                            <input type="text" placeholder="Describe los síntomas" name="temperatura" id="temperatura" 
                                   value="<?= isset($kid->healthinfo->incidents->temperature) ? $kid->healthinfo->incidents->temperature : "" ?>" required>
                            <span class="tempspan">°F</span>
                            <span class="error-message"></span>
                        </span>

                        <span class="input-group">
                            <i class="saludicon acuarela acuarela-Prioridad"></i>
                            <label class="labelpediatra" for="levelgrave">Nivel de gravedad</label>
                            <select name="levelgrave" id="levelgrave" required>
                                <option value="" disabled <?= empty($kid->healthinfo->incidents->gravedad) ? 'selected' : '' ?>> Agregar el nivel de gravedad del ninxs </option>
                                <option value="Leve" <?= isset($kid->healthinfo->incidents->gravedad) && $kid->healthinfo->incidents->gravedad == "Leve" ? 'selected' : '' ?>> Leve </option>
                                <option value="Moderado" <?= isset($kid->healthinfo->incidents->gravedad) && $kid->healthinfo->incidents->gravedad == "Moderado" ? 'selected' : '' ?>> Moderado </option>
                                <option value="Grave" <?= isset($kid->healthinfo->incidents->gravedad) && $kid->healthinfo->incidents->gravedad == "Grave" ? 'selected' : '' ?>> Grave </option>
                            </select>
                            <span class="error-message"></span>
                        </span>

                        <!-- <span>
                            <i class="acuarela acuarela-Salud"></i>
                            <label for="statehealth_text">Estado de salud</label>
                            <div class="state_health">
                                <input 
                                    type="text" 
                                    placeholder="Describa el estado de salud del niño o niña" 
                                    name="statehealth_text" 
                                    id="statehealth_text"
                                >
                                <label for="type_incident">Tipo de incidente</label>
                                <select name="type_incident" id="type_incident" required>
                                    <option value="" disabled selected>Seleccione el tipo de incidente</option>
                                    <option value="S">S (Síntomas generales)</option>
                                    <option value="C">C (Contusión)</option>
                                    <option value="B">B (Corte leve)</option>
                                    <option value="L">L (Lesión leve)</option>
                                    <option value="B/I">B/I (Golpe/inflamación)</option>
                                    <option value="N">N (Náusea)</option>
                                    <option value="A">A (Alergia)</option>
                                </select>
                                <label for="statehealth_select">Nivel de gravedad</label>
                                <select name="statehealth_select" id="statehealth_select" required>
                                    <option value="" disabled selected>Seleccione el nivel de gravedad</option>
                                    <option value="L">L (Leve)</option>
                                    <option value="R">R (Moderado)</option>
                                    <option value="B">B (Severo)</option>
                                    <option value="UE">UE (Extremidad superior)</option>
                                    <option value="LE">LE (Extremidad inferior)</option>
                                    <option value="H">H (Cabeza)</option>
                                    <option value="T">T (Tronco)</option>
                                </select>
                                <span id="severity_label" class="severity-label">Seleccione un nivel de gravedad</span>
                                <span class="error-message"></span>
                            </div>
                        </span> -->

                        <span class="input-group">
                            <i class="saludicon acuarela acuarela-Informacion"></i>
                            <label class="labelpediatra" for="acciones_tomadas">Acciones tomadas</label>
                            <input type="text" placeholder="Describe las acciones realizadas" name="acciones_tomadas" id="acciones_tomadas" 
                                   value="<?= isset($kid->healthinfo->incidents->actions_taken) ? $kid->healthinfo->incidents->actions_taken : "" ?>" required>
                            <span class="error-message"></span>
                        </span>

                        <span class="input-group">
                            <i class="saludicon acuarela acuarela-Informacion"></i>
                            <label class="labelpediatra" for="acciones_esperadas">Acciones esperadas</label>
                            <input type="text" placeholder="Describe las acciones que deberia realizar el acudiente" name="acciones_esperadas" id="acciones_esperadas" 
                                   value="<?= isset($kid->healthinfo->incidents->actions_expected) ? $kid->healthinfo->incidents->actions_expected : "" ?>" required>
                            <span class="error-message"></span>
                        </span>
                        
                    </div>
                    <div class="send-salud">
                        <button class="btn btn-action-primary enfasis btn-big btn-add" type="button" onclick="handleReportInfo()"> Guardar </button>
                    </div>
                </fieldset>
            </div>
        </div>
    </form>
</main>
<?php include "includes/footer.php" ?>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        // Verificar si se debe mostrar el botón
        if (localStorage.getItem("showEmergencyButton") === "true") {
            const sendSaludDiv = document.querySelector(".send-salud");

            if (sendSaludDiv) {
                const emergencyButton = document.createElement("button");
                emergencyButton.className = "emergency_contact";
                emergencyButton.id = "lightbox-emergencycontact";
                emergencyButton.textContent = "Contacto de Emergencia";
                emergencyButton.type = "button"; 
                emergencyButton.href = "javascript:;";
                emergencyButton.style.marginLeft = "50px";

                sendSaludDiv.appendChild(emergencyButton);

                setTimeout(() => {
                    const emergencycontact_lightbox = document.getElementById("lightbox-emergencycontact");
                    if (emergencycontact_lightbox) {
                    emergencycontact_lightbox.addEventListener("click", function (event) {
                        if (window.innerWidth > 425) {
                        showLightboxParient();
                        } else {
                        showLightboxEmergency();
                        }
                    });
                    }
                }, 100);
            }

            // Limpiar localStorage para que no aparezca en futuras recargas
            localStorage.removeItem("showEmergencyButton");
        }
    });

</script>
