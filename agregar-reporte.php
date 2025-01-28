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
    <form action="s/addAsistente/" id="incident-form" action="/submit" method="POST">
        <div class="content">
            <div class="contentninx">
                <fieldset class="fieldsalud">
                    <h2>Reporte de incidentes o sospecha de abusos </h2>
                    <div class="sectionsalud">
                        <h3 class="h3salud">Reportado por: </h3>
                        <div class="decorative-line"></div>
                        <span>
                            <i class="acuarela acuarela-Ayuda"></i>
                            <label for="name">Tipo de incidente</label>
                            <select name="tipo-incidente" id="tipo-incidente" required>
                                <option value="" disabled selected>Síntomas de enfermedad</option>
                                <option value="Fiebre">Fiebre</option>
                                <option value="Tos persistente">Tos persistente</option>
                                <option value="Congestión nasal">Congestión nasal</option>
                                <option value="Dolor de garganta">Dolor de garganta</option>
                                <option value="Dificultad para respirar">Dificultad para respirar</option>
                                <option value="Vómitos">Vómitos</option>
                                <option value="Diarrea">Diarrea</option>
                                <option value="Erupción cutánea">Erupción cutánea</option>
                                <option value="Caída o golpe">Caída o golpe</option>
                                <option value="Sangrado (herida leve)">Sangrado (herida leve)</option>
                                <option value="Reacción alérgica">Reacción alérgica</option>
                                <option value="Picadura de insecto">Picadura de insecto</option>
                                <option value="Fractura o esguince">Fractura o esguince</option>
                                <option value="Quemadura leve">Quemadura leve</option>
                                <option value="Ingestión de objeto extraño">Ingestión de objeto extraño</option>
                                <option value="Asfixia (obstrucción leve)">Asfixia (obstrucción leve)</option>
                                <option value="Mareos o desmayo">Mareos o desmayo</option>
                                <option value="Convulsiones">Convulsiones</option>
                                <option value="Síntomas de deshidratación">Síntomas de deshidratación</option>
                                <option value="Other">Other</option>
                            </select>
                        <span class="error-message"></span>
                        </span>
                        <span>
                            <i class="acuarela acuarela-Informacion"></i>
                            <label for="name">Descripción</label>
                            <input type="text" placeholder="Describe los síntomas" name="medico" id="medico">
                            <span class="error-message"></span>
                        </span>
                        <span>
                            <i class="acuarela acuarela-Informacion"></i>
                            <label for="temperatura">Temperatura</label>
                            <input clse="tempinput" type="number" name="temperatura" id="temperatura" placeholder="32" step="0.1">
                            <span class="tempspan">°F</span>
                        </span>
                        <span>
                            <i class="acuarela acuarela-Ayuda"></i>
                            <label for="name">Nivel de gravedad</label>
                            <select name="levelgrave" id="levelgrave" required>
                                <option value="" disabled selected>Agregar el nivel de gravedad del ninxs</option>
                                <option value="Leve">Leve</option>
                                <option value="Moderado">Moderado</option>
                                <option value="Grave">Grave</option>
                            </select>
                            <span class="error-message"></span>
                        </span>
                        <span>
                            <i class="acuarela acuarela-Salud"></i>
                            <label for="statehealth_text">Estado de salud</label>
                            <div class="state_health">
                                <!-- Campo para descripción -->
                                <input 
                                    type="text" 
                                    placeholder="Describa el estado de salud del niño o niña" 
                                    name="statehealth_text" 
                                    id="statehealth_text"
                                >

                                <!-- Menú desplegable para tipo de incidente -->
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

                                <!-- Menú desplegable para nivel de gravedad -->
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

                                <!-- Indicador dinámico -->
                                <span id="severity_label" class="severity-label">Seleccione un nivel de gravedad</span>

                                <!-- Mensaje de error -->
                                <span class="error-message"></span>
                            </div>
                        </span>

                        <span>
                            <i class="acuarela acuarela-Informacion"></i>
                            <label for="name">Acciones tomadas</label>
                            <input type="text" placeholder="Describe las acciones realizadas" name="medico" id="medico">
                            <span class="error-message"></span>
                        </span>
                        <span>
                            <i class="acuarela acuarela-Informacion"></i>
                            <label for="name">Acciones esperadas</label>
                            <input type="text" placeholder="Describe las acciones que deberia realizar el acudiente" name="medico" id="medico">
                            <span class="error-message"></span>
                        </span>
                    </div>
                    <div class="send-salud">
                        <button class="btn btn-action-primary enfasis btn-big btn-add" onclick="handleHealthInfo()"> Guardar </button>           
                    </div>
                </fieldset>
            </div>
        </div>
    </form>
</main>
<?php include "includes/footer.php" ?>

<script>
    const typeIncident = document.getElementById('type_incident');
    const selectElement = document.getElementById('statehealth_select');
    const severityLabel = document.getElementById('severity_label');

    // Diccionario para describir el tipo de incidente
    const typeDescriptions = {
        "S": "Scratch",
        "C": "Cut",
        "B": "Bruise",
        "L": "Laceration",
        "B/I": "Bite Injury",
        "N": "Nosebleed",
        "A": "Allergic Reaction"
    };

    // Diccionario para describir el nivel de gravedad
    const severityDescriptions = {
        "L": "Leve",
        "R": "Moderado",
        "B": "Severo",
        "UE": "Extremidad superior",
        "LE": "Extremidad inferior",
        "H": "Cabeza",
        "T": "Tronco"
    };

    // Actualizar la descripción combinada
    const updateSeverityLabel = () => {
        const typeValue = typeIncident.value; // Valor seleccionado del tipo de incidente
        const severityValue = selectElement.value; // Valor seleccionado del nivel de gravedad

        if (typeValue && severityValue) {
            // Obtener las descripciones traducidas
            const typeDescription = typeDescriptions[typeValue];
            const severityDescription = severityDescriptions[severityValue];

            // Actualizar el texto del indicador dinámico
            severityLabel.textContent = `${typeDescription} ${severityDescription}`;
        } else {
            // Mostrar un mensaje predeterminado si falta alguna selección
            severityLabel.textContent = "Seleccione un tipo de incidente y un nivel de gravedad";
        }
    };

    // Eventos para actualizar el indicador dinámico
    typeIncident.addEventListener('change', updateSeverityLabel);
    selectElement.addEventListener('change', updateSeverityLabel);
</script>
