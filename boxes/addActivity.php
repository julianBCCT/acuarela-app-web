<div id="lightbox-activities" class="lightbox">
  <div class="lightbox-content">
    <form action="" method="POST" id="createActicity">
      <div class="steps">
        <div class="step step-1 active">
          <h2 id="lightbox-title">Agregar actividad</h2>
          <h3 id="lightbox-subtitle">Elige la actividad que quieres agregar</h3>
          <fieldset>
            <ul class="types">
              <li>
                <input type="radio" name="activityType" id="6088935af169a43504538925" value="6088935af169a43504538925"
                  onchange="updateIconClass('acuarela-Alimentacion', 'Alimentación')">
                <label for="6088935af169a43504538925">
                  <i class="acuarela acuarela-Alimentacion"></i>
                  <span>Alimentación</span>
                </label>
              </li>
              <li>
                <input type="radio" name="activityType" id="60889371f169a43504538926" value="60889371f169a43504538926"
                  onchange="updateIconClass('acuarela-Siesta', 'Siesta')">
                <label for="60889371f169a43504538926">
                  <i class="acuarela acuarela-Siesta"></i>
                  <span>Siesta</span>
                </label>
              </li>
              <li>
                <input type="radio" name="activityType" id="6088937ff169a43504538927" value="6088937ff169a43504538927"
                  onchange="updateIconClass('acuarela-Bano', 'Baño')">
                <label for="6088937ff169a43504538927">
                  <i class="acuarela acuarela-Bano"></i>
                  <span>Baño</span>
                </label>
              </li>
              <!-- <li>
                <input type="radio" name="activityType" id="6088939df169a43504538929"
                  onchange="updateIconClass('acuarela-Salud', 'Health Check')">
                <label for="6088939df169a43504538929">
                  <i class="acuarela acuarela-Salud"></i>
                  <span>Health Check</span>
                </label>
              </li> -->
              <li>
                <input type="radio" name="activityType" id="608893aef169a4350453892a" value="608893aef169a4350453892a"
                  onchange="updateIconClass('acuarela-Actividades', 'Actividades')">
                <label for="608893aef169a4350453892a">
                  <i class="acuarela acuarela-Actividades"></i>
                  <span>Actividades</span>
                </label>
              </li>
            </ul>
            <button type="button" onclick="nextStep()" class="btn btn-action-primary enfasis btn-big">Siguiente</button>
          </fieldset>
        </div>
        <div class="step step-2">
          <h2 id="lightbox-title">Actividades</h2>
          <div class="typeSelected">
            <i class="acuarela typeSelectedIcon"></i>
            <div class="txt">
              <strong class="typeSelectedName">Juego</strong>
              <strong>¿Quiénes participaron?</strong>
            </div>
          </div>
          <ul class="participaron">
            <?php 
            for ($i=0; $i < count($children); $i++) { 
            $kid = $children[$i];
          ?>
            <li>
              <input type="radio" name="kidSelected" id="<?=$kid->id?>">
              <label for="<?=$kid->id?>">
                <?php
                $photoUrl = isset($kid->photo) ? 'https://acuarelacore.com/api/' . $kid->photo->formats->small->url : null;
                $gender = $kid->gender;

                if ($photoUrl) {
                    echo "<img src='$photoUrl' alt='{$kid->name}'>";
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
                <span><?=$kid->name?></span>
                <label for="rate-<?=$kid->id?>-0">
                  <input type="radio" name="rate-<?=$kid->id?>-0" id="rate-<?=$kid->id?>-0" value="0">
                  <i class="acuarela acuarela-Anadir_reaccion"></i>
                </label>
                <label for="rate-<?=$kid->id?>-1">
                  <input type="radio" name="rate-<?=$kid->id?>-1" id="rate-<?=$kid->id?>-1" value="1">
                  <i class="acuarela acuarela-Anadir_reaccion"></i>
                </label>
                <label for="rate-<?=$kid->id?>-2">
                  <input type="radio" name="rate-<?=$kid->id?>-2" id="rate-<?=$kid->id?>-2" value="2">
                  <i class="acuarela acuarela-Anadir_reaccion"></i>
                </label>
              </label>
            </li>
            <?php } ?>
          </ul>
          <button type="button" onclick="nextStep()" class="btn btn-action-primary enfasis btn-big">Siguiente</button>
        </div>
        <div class="step step-3">
          <div class="typeSelected">
            <i class="acuarela typeSelectedIcon"></i>
            <div class="txt">
              <strong class="typeSelectedName">Juego</strong>
              <strong>¿Quiénes participaron?</strong>
            </div>
          </div>
          <span><i class="acuarela acuarela-"></i><label for="">Título de la actividad</label><input type="text"
              name="title" id="title"></span>
          <span><i class="acuarela acuarela-"></i><label for="">Descripción</label><textarea name="description"
              id="description"></textarea></span>
              <button type="button" onclick="sendActivity()" class="btn btn-action-primary enfasis btn-big">Guardar</button>
        </div>
      </div>
      <input type="hidden" name="group" id="group" value="<?=$grupo->id?>">
    </form>

  </div>
</div>