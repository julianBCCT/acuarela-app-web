<?php $classBody ="configuracion"; include "includes/header.php"; ?>
<main>
    <?php
    $mainHeaderTitle = $_SESSION["userAll"]->name ." ". $_SESSION["userAll"]->lastname;
    $action = '';
    include "templates/sectionHeader.php";
?>
    <div class="navtabs">
        <div class="navtab active" data-target="cuenta">Cuenta</div>
        <div class="navtab" data-target="daycares">Mis Daycares</div>
        <!-- <div class="navtab" data-target="metodos">Métodos de pago</div> -->
        <div class="underline"></div>
    </div>
    <div class="content">
        <div id="cuenta" class="tab-content active">
            <div class="basicinfo">
                <div class="photo">
                    <?=$_SESSION["userAll"]->photo ? '<img loading="lazy" class="lazyload" src="img/placeholder.png" data-src="https://acuarelacore.com/api/'.$_SESSION["userAll"]->photo->url.'" alt="profilePhoto" />' : '<img loading="lazy" class="lazyload" src="img/placeholder.png" data-src="img/placeholder.png" alt="profilePhoto" />'?>

                </div>
                <div class="txt">
                    <p><i
                            class="acuarela acuarela-Usuario"></i><span>Nombre</span><strong><?=$_SESSION["userAll"]->name ." ". $_SESSION["userAll"]->lastname?></strong>
                    </p>
                    <p><i
                            class="acuarela acuarela-Mensajes"></i><span>E-mail</span><strong><?=$_SESSION["userAll"]->mail?></strong>
                    </p>
                    <p><i
                            class="acuarela acuarela-Telefono"></i><span>Teléfono</span><strong><?=$_SESSION["userAll"]->phone?></strong>
                    </p>
                </div>
                <a href="" class="btn btn-action-primary enfasis btn-big">Editar perfil</a>
            </div>
        </div>
        <div id="daycares" class="tab-content">
        <div class="emptyElement" style="display:flex;">
            <h2>Información de mis daycares</h2>
            <p>Para ver y editar la información de tus daycares ingresa aquí</p>
            <a href="/miembros/mi-perfil" target="_blank" class="btn btn-action-primary enfasis btn-big">Mis Daycares</a>
        </div>
        </div>
        <!-- <div id="metodos" class="tab-content"></div> -->

    </div>
</main>
<?php include "includes/footer.php" ?>