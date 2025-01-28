<?php $classBody ="agregarsalud"; include "includes/header.php"; 
$kid = $a->getChildren($_GET['id']);
$salud = isset($_GET['id']) ? $a->getHealthinfo($_GET['id']) : "";
?>

<main>
    <?php
    $mainHeaderTitle = "{$kid->name} {$kid->lastname}" ;
    include "templates/sectionHeader.php";    
?>
    <form id="healthInfoForm">
        <div class="content">
            <div class="contentninx">
                <fieldset class="fieldsalud">
                    <h2>Información salud del niño </h2>
                    <div class="sectionsalud">
                        <h3 class="h3salud">Historial de salud: </h3>
                        <div class="decorative-line"></div>
                        <span class="input-group">
                            <label class="checkboxsalud" for="asma">Asma</label>
                            <input type="checkbox" name="asma" id="asma" value="1">
                            <span class="error-message"></span>
                        </span>
                        <span>
                            <label for="alergias">Alergias</label>
                            <input type="text" placeholder="Agregar alergías" name="alergias" id="alergias" /
                            value="<?= $salud != "" ? $salud->alergias : "" ?>" required>
                            <i class="acu acuarela acuarela-Agregar"></i>
                            <span class="error-message"></span>
                        </span>

                        <span>
                            <label for="name">Medicamentos</label>
                            <input type="text" placeholder="Agregar medicamentos" name="medicamentos" id="medicamentos">
                            <i class="acu acuarela acuarela-Agregar"></i>
                            <span class="error-message"></span>
                        </span>
                        <span>
                            <label for="name">Vacunas</label>
                            <input type="text" placeholder="Agregar vacunas" name="vacunas" id="vacunas">
                            <i class="acu acuarela acuarela-Agregar"></i>
                            <span class="error-message"></span>
                        </span>
                        <span>
                            <label for="name">Accidentes</label>
                            <input type="text" placeholder="Agregar accidentes" name="accidentes" id="vacunas">
                            <i class="acu acuarela acuarela-Agregar"></i>
                            <span class="error-message"></span>
                        </span>
                        <span>
                            <label for="name">Salud fisica</label>
                            <input type="text" placeholder="Agregar el estado de salud física" name="physical health" id="vacunas">
                            <i class="acu acuarela acuarela-Agregar"></i>
                            <span class="error-message"></span>
                        </span>
                        <span>
                            <label for="name">Salud emocional</label>
                            <input type="text" placeholder="Agregar su salud mental" name="physical health" id="vacunas">
                            <i class="acu acuarela acuarela-Agregar"></i>
                            <span class="error-message"></span>
                        </span>
                        <span>
                            <label for="name">Sospecha de abuso</label>
                            <input type="text" placeholder="En caso de existir sospecha agregar detalles" name="physical health" id="vacunas">
                            <i class="acu acuarela acuarela-Agregar"></i>
                            <span class="error-message"></span>
                        </span>
                        <span>
                            <label for="name">Otros</label>
                            <input type="text" placeholder="Agregar otros datos de salud importantes" name="saludotros" id="saludotros">
                            <i class="acu acuarela acuarela-Agregar"></i>
                            <span class="error-message"></span>
                        </span>
                    </div>
                    <div class="sectionsalud">
                        <h3 class="h3salud">Unguentos autorizados: </h3>
                        <div class="decorative-line"></div>
                        <span>
                            <label for="name">Bloqueador solar</label>
                            <input type="checkbox" name="bloqueadorsolar" id="bloqueadorsolar">
                            <span class="error-message"></span>
                        </span>
                        <span>
                            <label for="name">Repelente de insectos</label>
                            <input type="checkbox" name="repelenteinsectos" id="repelenteinsectos">
                            <span class="error-message"></span>
                        </span>
                        <span>
                            <label for="name">Otros</label>
                            <input type="text" placeholder="Agregar otros datos de salud importantes" name="saludotros" id="saludotros">
                            <i class="acu acuarela acuarela-Agregar"></i>
                            <span class="error-message"></span>
                        </span>
                    </div>
                    <div class="sectionsalud">
                        <h3 class="h3salud">Información de médico o pediatra: </h3>
                        <div class="decorative-line"></div>
                        <span>
                            <i class="acuarela acuarela-Usuario"></i>
                            <label for="name">Médico</label>
                            <input type="text" placeholder="Ingresar nombre del médico" name="medico" id="medico">
                            <i class="acu acuarela acuarela-Agregar"></i>
                            <span class="error-message"></span>
                        </span>
                        <span>
                            <i class="acuarela acuarela-Telefono"></i>
                            <label for="name">Teléfono</label>
                            <input type="tel" placeholder="Ingresar teléfono del médico" name="telmedico" id="telmedico">
                            <i class="acu acuarela acuarela-Agregar"></i>
                            <span class="error-message"></span>
                        </span>
                        <span>
                            <i class="acuarela acuarela-Mensajes"></i>
                            <label for="name">Correo electrónico</label>
                            <input type="email" placeholder="Ingresar correo del médico" name="emailmedico" id="emailmedico">
                            <i class="acu acuarela acuarela-Agregar"></i>
                            <span class="error-message"></span>
                        </span>
                    </div>    
                    <div class="send-salud">
                        <button class="btn btn-action-primary enfasis btn-big btn-add" type="button" onclick="handleHealthInfo()"> Guardar </button>           
                    </div>
                </fieldset>
            </div>
        </div>
    </form>
</main>
<?php include "includes/footer.php" ?>