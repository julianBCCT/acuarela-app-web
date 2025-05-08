<?php $classBody = "changedaycare";
include "includes/header.php" ?>
<main>
  <?php
      $mainHeaderTitle = '<span data-translate="196"></span>';
      $action = '';
      include "templates/sectionHeader.php";
  ?>
  <div class="content">
    <ul class="listDaycare">
      <?php for ($i=0; $i < count($daycares); $i++) { $daycare = $daycares[$i] ?>
      <li>
        <a href="s/daycareActive/?daycare=<?=$daycare->id?>">
          <div class="card w_image lg">
            <div class="card__img">
              <img
                src="https://picsum.photos/200?v=<?=$daycare->id?>"
                alt="image">
            </div>
            <div class="card_content">
              <div class="card__header">
                <div class="card__header-title"> <?=$daycare->name?></div>
              </div>
              <div class="card__body">
  
              </div>
            </div>
          </div>
        </a>
      </li>
      <?php } ?>
    </ul>
  </div>
</main>

<?php include "boxes/tour.php" ?>
<?php include "includes/footer.php" ?>