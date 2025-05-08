<?php include "includes/config.php";
$daycares =  $_SESSION["user"]->daycares;
function findDaycareById($daycares, $id) {
    foreach ($daycares as $daycare) {
        if ($daycare->id === $id) {
            return $daycare;
        }
    }
    return null; // Si no se encuentra
}
$foundDaycare = findDaycareById($daycares, $a->daycareID);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <base href="/miembros/acuarela-app-web/">
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Acuarela web app</title>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
  <link rel="stylesheet" href="css/acuarela_theme.css?v=<?= time() ?>" />
  <link rel="stylesheet" href="css/styles.css?v=<?= time() ?>" />
  <link rel="shortcut icon" href="img/favicon.png" />
  <script>
    let userMainT = "<?= $a->token ?>";
    let userNameAdmin = "<?= $_SESSION["user"]->name ?>";
    let emailAdmin = "<?= $_SESSION["user"]->email ?>";
    let daycareName = "<?= $_SESSION["user"]->daycares[0]->name ?>";
    let daycareActiveId = "<?= $a->daycareID ?>";

    // Assuming the daycares array is available in the session
    let daycares = <?php echo json_encode($_SESSION["user"]->daycares); ?>;
    let acuarelaId = "<?= $_SESSION["user"]->acuarelauser->id ?>";

    // Function to find a daycare by ID
    function findDaycareById(daycares, id) {
      return daycares.find(daycare => daycare.id === id);
    }

    // Example usage
    let daycareId = 1; // Replace with the ID you are looking for
    let foundDaycare = findDaycareById(daycares, "<?= $a->daycareID ?>");
    document.addEventListener("DOMContentLoaded", function() {
      if (foundDaycare) {
        document.querySelector('.logout a').href = `/miembros/daycare/<?= $a->get_alias($_SESSION["user"]->daycares[0]->name) ?>/<?= $a->daycareID ?>`;
      }
    })
  </script>
</head>

<body class="<?= $classBody ?>">