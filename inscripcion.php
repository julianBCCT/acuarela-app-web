<?php 
  $classBody ="inscripcion"; 
  include "includes/header.php";
  $inscripcion = isset($_GET['id']) ? $a->getInscripciones($_GET['id']) : "";
?>
<main>
  <?php
    $mainHeaderTitle = "Agregar Niñx";
    $action = '<button class="btn btn-action-primary enfasis btn-big" onclick="handleInscripcion()">Guardar Borrador</button>';
    include "templates/sectionHeader.php";
?>
  <div class="navtabs">
    <div class="navtab active" data-target="basica">Información básica</div>
    <div class="navtab" data-target="familia">Familia</div>
    <div class="navtab" data-target="pagos">Horarios y pagos</div>
    <div class="navtab" data-target="adjuntos">Adjuntos</div>
    <div class="navtab" data-target="resumen">Resumen</div>
    <div class="underline"></div>
  </div>
  <div class="content">
    <form action="s/createInscription/" method="POST" id="inscription" autocomplete="off">
      <div class="formHeader">
        <strong>
          Has completado el <span class="percentage"><?=$inscripcion != "" ? $inscripcion->percentaje : "0"?>%</span> de la inscripción
          mínima de <span class="name"></span>
        </strong>
        <button type="button" id="next" class="btn btn-action-secondary btn-big enfasis">
          Siguiente
        </button>
      </div>
      <div id="basica" class="tab-content active">
        <span>
          <i class="acuarela acuarela-Usuario"></i>
          <label for="name">Nombre</label>
          <input type="text" name="name" id="name" / value="<?=$inscripcion != "" ? $inscripcion->name : ""?>" required>
        </span>
        <span>
          <i class="acuarela acuarela-Usuario"></i>
          <label for="lastname">Apellidos</label>
          <input type="text" name="lastname" id="lastname" / value="<?=$inscripcion != "" ? $inscripcion->lastname : ""?>" required>
        </span>
        <div class="row">
          <span class="calendar">
            <i class="acuarela acuarela-Calendario"></i>
            <label for="birthdate">Fecha de nacimiento</label>
            <input type="date" name="birthdate" id="birthdate" / value="<?=$inscripcion != "" ? $inscripcion->birthdate : ""?>" required>
          </span>
          <span>
            <i class="acuarela acuarela-Nino"></i>
            <label for="genero">Género</label>
            <select name="genero" id="genero" <?=$inscripcion != "" ? $inscripcion->gender : ""?>>
              <option <?=$inscripcion != "" && $inscripcion->gender == "Masculino" ? "selected" : ""?> value="Masculino">Masculino</option>
              <option <?=$inscripcion != "" && $inscripcion->gender == "Femenino" ? "selected" : ""?> value="Femenino">Femenino</option>
              <option <?=$inscripcion != "" && $inscripcion->gender == "X" ? "selected" : ""?> value="X">X</option>
            </select>
          </span>
        </div>
      </div>
      <div id="familia" class="tab-content">
        <section class="splide" id="family" aria-label="Splide Basic HTML Example">
          <div class="splide__track">
            <ul class="splide__list">
              <li class="splide__slide">
                <fieldset>
                  <h4>Padre 1</h4>
                  <span>
                    <i class="acuarela acuarela-Familia"></i>
                    <label for="parent_type1">Parentesco</label>
                    <select name="parent_type1" id="parent_type1">
                      <option value="Mamá">Mamá</option>
                      <option value="Papá">Papá</option>
                    </select>
                  </span>
                  <span>
                    <i class="acuarela acuarela-Mensajes"></i>
                    <label for="parent_email1">Correo Electrónico</label>
                    <input type="text" autocomplete="off" name="parent_email1" id="parent_email1"
                      onchange="handleEmailChange(event, 1)" value="<?=$inscripcion != "" ? $inscripcion->parents[0]->email : ""?>" required />
                  </span>
                  <span>
                    <i class="acuarela acuarela-Usuario"></i>
                    <label for="parent_name1">Nombres</label>
                    <input type="text" autocomplete="off" name="parent_name1" id="parent_name1" value="<?=$inscripcion != "" ? $inscripcion->parents[0]->name : ""?>" required />
                  </span>
                  <span>
                    <i class="acuarela acuarela-Usuario"></i>
                    <label for="parent_lastname1">Apellidos</label>
                    <input type="text" autocomplete="off" name="parent_lastname1" id="parent_lastname1" value="<?=$inscripcion != "" ? $inscripcion->parents[0]->lastname : ""?>" required />
                  </span>
                  <span>
                    <i class="acuarela acuarela-Telefono"></i>
                    <label for="parent_phone1">Celular</label>
                    <input type="text" autocomplete="off" name="parent_phone1" id="parent_phone1" value="<?=$inscripcion != "" ? $inscripcion->parents[0]->phone : ""?>" required />
                  </span>
                </fieldset>
              </li>
              <li class="splide__slide">
                <fieldset>
                  <h4>Padre 2</h4>
                  <span>
                    <i class="acuarela acuarela-Familia"></i>
                    <label for="parent_type2">Parentesco</label>
                    <select name="parent_type2" id="parent_type2">
                      <option value="Mamá">Mamá</option>
                      <option value="Papá">Papá</option>
                    </select>
                  </span>
                  <span>
                    <i class="acuarela acuarela-Mensajes"></i>
                    <label for="parent_email2">Correo Electrónico</label>
                    <input type="text" autocomplete="off" name="parent_email2" id="parent_email2"
                      onchange="handleEmailChange(event, 2)" value="<?=$inscripcion != "" ? $inscripcion->parents[1]->email : ""?>" />
                  </span>
                  <span>
                    <i class="acuarela acuarela-Usuario"></i>
                    <label for="parent_name2">Nombres</label>
                    <input type="text" autocomplete="off" name="parent_name2" id="parent_name2" value="<?=$inscripcion != "" ? $inscripcion->parents[1]->name : ""?>" />
                  </span>
                  <span>
                    <i class="acuarela acuarela-Usuario"></i>
                    <label for="parent_lastname2">Apellidos</label>
                    <input type="text" autocomplete="off" name="parent_lastname2" id="parent_lastname2" value="<?=$inscripcion != "" ? $inscripcion->parents[1]->lastname : ""?>" />
                  </span>
                  <span>
                    <i class="acuarela acuarela-Telefono"></i>
                    <label for="parent_phone2">Celular</label>
                    <input type="text" autocomplete="off" name="parent_phone2" id="parent_phone2" value="<?=$inscripcion != "" ? $inscripcion->parents[1]->phone : ""?>" />
                  </span>
                </fieldset>
              </li>
            </ul>
          </div>
        </section>
      </div>
      <div id="pagos" class="tab-content">
        <span>
          <i class="acuarela acuarela-Nino"></i>
          <label for="paymentTime">Cada cuánto se cobra:</label>
          <select name="paymentTime" id="paymentTime">
            <option <?=$inscripcion != "" && $inscripcion->payment->time == "Diario" ? "selected" : ""?> value="Diario">Diario</option>
            <option <?=$inscripcion != "" && $inscripcion->payment->time == "Semanal" ? "selected" : ""?> value="Semanal">Semanal</option>
            <option <?=$inscripcion != "" && $inscripcion->payment->time == "Mensual" ? "selected" : ""?> value="Mensual">Mensual</option>
            <option <?=$inscripcion != "" && $inscripcion->payment->time == "Semestral" ? "selected" : ""?> value="Semestral">Semestral</option>
            <option <?=$inscripcion != "" && $inscripcion->payment->time == "Anual" ? "selected" : ""?> value="Anual">Anual</option>
          </select>
        </span>
        <span class="calendar">
          <i class="acuarela acuarela-Calendario"></i>
          <label for="proximo_pago">Inicio del cobro</label>
          <input type="date" name="proximo_pago" id="proximo_pago" value="<?=$inscripcion != "" ? $inscripcion->payment->proximo_pago : ""?>" required />
        </span>
        <span>
          <i class="acuarela acuarela-Usuario"></i>
          <label for="paymentPrice">Cuánto se va a cobrar:</label>
          <input type="text" name="paymentPrice" id="paymentPrice" value="<?=$inscripcion != "" ? $inscripcion->payment->price : ""?>" required />
        </span>
        <div class="info">
          <i class="acuarela acuarela-Informacion"></i>
          <p>
            Recuerda asociar una cuenta PayPal en tu perfil para beneficiarte de
            los pagos automáticos.
          </p>
        </div>
      </div>
      <div id="adjuntos" class="tab-content">
        <div class="wrapper">
          <input type="hidden" id="acuerdo-de-registro-id" name="acuerdo-de-registro-id">
          <input type="file" id="acuerdo-de-registro" name="acuerdo-de-registro" />
          <label for="acuerdo-de-registro" class="btn-1"><i class="acuarela acuarela-Agregar"></i>Subir Acuerdo de
            registro</label>
        </div>
        <div class="wrapper">
          <input type="hidden" id="formulario-de-examen-de-salud-id" name="formulario-de-examen-de-salud-id">
          <input type="file" id="formulario-de-examen-de-salud" name="formulario-de-examen-de-salud" />
          <label for="formulario-de-examen-de-salud" class="btn-1"><i class="acuarela acuarela-Agregar"></i>Subir
            Formulario de examen de salud</label>
        </div>
        <div class="wrapper">
          <input type="hidden" id="formato-de-alergias-id" name="formato-de-alergias-id">
          <input type="file" id="formato-de-alergias" name="formato-de-alergias" />
          <label for="formato-de-alergias" class="btn-1"><i class="acuarela acuarela-Agregar"></i>Subir Formato de
            alergias</label>
        </div>
        <div class="wrapper">
          <input type="hidden" id="id-de-los-padres-id" name="id-de-los-padres-id">
          <input type="file" id="id-de-los-padres" name="id-de-los-padres" />
          <label for="id-de-los-padres" class="btn-1"><i class="acuarela acuarela-Agregar"></i>Subir ID de los
            padres</label>
        </div>
        <div class="wrapper">
          <input type="hidden" id="plan-de-transporte-id" name="plan-de-transporte-id">
          <input type="file" id="plan-de-transporte" name="plan-de-transporte" />
          <label for="plan-de-transporte" class="btn-1"><i class="acuarela acuarela-Agregar"></i>Subir Plan de
            transporte</label>
        </div>
        <div class="wrapper">
          <input type="hidden" id="acuerdo-de-siestas-id" name="acuerdo-de-siestas-id">
          <input type="file" id="acuerdo-de-siestas" name="acuerdo-de-siestas" />
          <label for="acuerdo-de-siestas" class="btn-1"><i class="acuarela acuarela-Agregar"></i>Subir Acuerdo de
            siestas</label>
        </div>
        <div class="wrapper">
          <input type="hidden" id="archivos-adicionales-id" name="archivos-adicionales-id">
          <input type="file" id="archivos-adicionales" name="archivos-adicionales" />
          <label for="archivos-adicionales" class="btn-1"><i class="acuarela acuarela-Agregar"></i>Subir archivos
            adicionales</label>
        </div>
      </div>
      <div id="resumen" class="tab-content">
        <h4>Información básica del niño</h4>
        <p id="resname">
          <i class="acuarela acuarela-Usuario"></i>Nombre<strong>Nombre</strong>
        </p>
        <div class="row">
          <p id="resbirthday">
            <i class="acuarela acuarela-Evento"></i>Nacido el<strong>Nacido el</strong>
          </p>
          <p id="resgender">
            <i class="acuarela acuarela-Nino"></i>Género<strong>Género</strong>
          </p>
        </div>
        <h4>Responsables</h4>
        <div class="row">
          <p id="resparentname">
            <i class="acuarela acuarela-Usuario"></i>Nombre<strong>Nombre</strong>
          </p>
          <p id="resparenttype">
            <i class="acuarela acuarela-Familia"></i>Parentesco<strong>Parentesco</strong>
          </p>
        </div>
        <div class="row">
          <p id="resparenttel">
            <i class="acuarela acuarela-Telefono"></i>Celular<strong>Celular</strong>
          </p>
          <p id="resparentmail">
            <i class="acuarela acuarela-Mensajes"></i>Correo electrónico<strong Correo electrónico></strong>
          </p>
        </div>
      </div>
      <input type="hidden" name="daycare" id="daycare" value="<?=$a->daycareID?>">
      <input type="hidden" name="inscripcion" id="inscripcion" value="<?=$_GET['id']?>">
    </form>
  </div>
</main>

<?php include "includes/footer.php" ?>