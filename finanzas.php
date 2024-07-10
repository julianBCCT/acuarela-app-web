<?php 
    $classBody ="finanzas"; 
    include "includes/header.php";
    $movements = $a->getMovements();
    $text = array("0" => "PAGO RECHAZADO","1" => "PAGO APROBADO","2" => "PAGO PENDIENTE");
    $color = array("0" => "#eb5d5e", "1"=> "#3fb072","2" => "#f5aa16");
    // Suponiendo que $movements es tu array de objetos
    $ingresos = [];
    $gastos = [];
    $pendientes = [];

    $ingresosTotal = 0;
    $gastosTotal = 0;
    $pendientesTotal = 0;
    
    foreach ($movements as $movement) {
        // Clasifica los movimientos en los arrays correspondientes según su tipo
        switch ($movement->type) {
            case 0:
                $gastos[] = $movement;
                $gastosTotal += $movement->amount; // Suma el monto al total de gastos
                break;
            case 1:
                $ingresos[] = $movement;
                $ingresosTotal += $movement->amount; // Suma el monto al total de ingresos
                break;
            case 2:
                $pendientes[] = $movement;
                $pendientesTotal += $movement->amount; // Suma el monto al total de pendientes
                break;
        }
    }
    // Calcula el balance
$balance = $ingresosTotal - $gastosTotal;
?>
<main>
    <?php
    $mainHeaderTitle = "Finanzas" ;
    $action = '';
    include "templates/sectionHeader.php";
?>
    <div class="navtabs">
        <div class="navtab active" data-target="reporte">Reporte contable</div>
        <div class="navtab" data-target="ingresos">Ingresos</div>
        <div class="navtab" data-target="gastos">Gastos</div>
        <div class="navtab" data-target="pendientes">Pendientes</div>
        <div class="underline"></div>
    </div>
    <div class="content">
        <form action="" id="filterReporte" method="get">
            <span class="calendar">
                <label for="desde">Desde</label>
                <input type="date" name="desde" id="desde" />
            </span>
            <span class="calendar">
                <label for="hasta">Hasta</label>
                <input type="date" name="hasta" id="hasta" />
            </span>
        </form>
        <div id="reporte" class="tab-content active">
            <div class="cardsFinanza">
                <div class="cardFinanza">
                    <div class="txt">
                        <small>Ingresos</small>
                        <strong>$<?=$ingresosTotal?> USD</strong>
                    </div>
                    <i class="acuarela acuarela-Ingresos"></i>
                </div>
                <div class="cardFinanza">
                    <div class="txt">
                        <small>Gastos</small>
                        <strong>$<?=$gastosTotal ?> USD</strong>
                    </div>
                    <i class="acuarela acuarela-Gastos"></i>
                </div>
                <div class="cardFinanza">
                    <div class="txt">
                        <small>Balance</small>
                        <strong>$<?=$balance?> USD</strong>
                    </div>
                    <i class="acuarela acuarela-Balance"></i>
                </div>
            </div>
            <table>
                <tbody>
                    
                    <?php 
                        for ($i=0; $i < count($movements); $i++) { 
                        $movement = $movements[$i];
                    ?>
                            <tr>
                            <td><h4><?=$movement->name?></h4></td>
                            <td><span class="status" style="color:<?=$color[$movement->type]?>;"><?=$text[$movement->type]?></span></td>
                            <td><span class="date">
                            <?php
                            // Crea un objeto DateTime desde la cadena ISO 8601
                            $movementDate = new DateTime($movement->date);
                            // Formatea la fecha al formato MM-DD-YYYY
                            $payDate_formateada = $movementDate->format('m-d-Y');
                            echo $payDate_formateada;
                            ?>
                        </span></td>
                            <td>  <span class="amount">
                            $<?=$movement->amount?>
                        </span></td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
        <div id="ingresos" class="tab-content">
            <table>
                <tbody>
                    
                    <?php 
                        for ($i=0; $i < count($ingresos); $i++) { 
                        $ingreso = $ingresos[$i];
                    ?>
                            <tr>
                            <td><h4><?=$ingreso->name?></h4></td>
                            <td><span class="status" style="color:<?=$color[$ingreso->type]?>;"><?=$text[$ingreso->type]?></span></td>
                            <td><span class="date">
                            <?php
                            // Crea un objeto DateTime desde la cadena ISO 8601
                            $ingresoDate = new DateTime($ingreso->date);
                            // Formatea la fecha al formato MM-DD-YYYY
                            $payDate_formateada = $ingresoDate->format('m-d-Y');
                            echo $payDate_formateada;
                            ?>
                        </span></td>
                            <td>  <span class="amount">
                            $<?=$ingreso->amount?>
                        </span></td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
        <div id="gastos" class="tab-content">
            <table>
                <tbody>
                    
                    <?php 
                        for ($i=0; $i < count($gastos); $i++) { 
                        $gasto = $gastos[$i];
                    ?>
                            <tr>
                            <td><h4><?=$gasto->name?></h4></td>
                            <td><span class="status" style="color:<?=$color[$gasto->type]?>;"><?=$text[$gasto->type]?></span></td>
                            <td><span class="date">
                            <?php
                            // Crea un objeto DateTime desde la cadena ISO 8601
                            $gastoDate = new DateTime($gasto->date);
                            // Formatea la fecha al formato MM-DD-YYYY
                            $payDate_formateada = $gastoDate->format('m-d-Y');
                            echo $payDate_formateada;
                            ?>
                        </span></td>
                            <td>  <span class="amount">
                            $<?=$gasto->amount?>
                        </span></td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
        <div id="pendientes" class="tab-content">
            <table>
                <tbody>
                    
                    <?php 
                        for ($i=0; $i < count($pendientes); $i++) { 
                        $pendiente = $pendientes[$i];
                    ?>
                            <tr>
                            <td><h4><?=$pendiente->name?></h4></td>
                            <td><span class="status" style="color:<?=$color[$pendiente->type]?>;"><?=$text[$pendiente->type]?></span></td>
                            <td><span class="date">
                            <?php
                            // Crea un objeto DateTime desde la cadena ISO 8601
                            $pendienteDate = new DateTime($pendiente->date);
                            // Formatea la fecha al formato MM-DD-YYYY
                            $payDate_formateada = $pendienteDate->format('m-d-Y');
                            echo $payDate_formateada;
                            ?>
                        </span></td>
                            <td>  <span class="amount">
                            $<?=$pendiente->amount?>
                        </span></td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
</main>
<?php include "includes/footer.php" ?>