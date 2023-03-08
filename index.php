<?php
require_once 'assets/templates/autoload.php';
session_start();
$dbSelect = new DBSelect();
$gamesRenderer = new AllGamesRenderer();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Генератор событий</title>
    <script src="assets/src/jQuery.js"></script>
    <script src="scripts/includer.js"></script>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/index.css">
    <script src="scripts/gameController.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a7e9f794eb.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Bootstrap Bundle JS (jsDelivr CDN) -->
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
<?php
if (isset($_SESSION['username'])) {
    if (isset($_SESSION['gameId'])) {
        echo '<div id="navBar"></div>';
    }
    $userId = $dbSelect->getUIdByLogin($_SESSION['username']);
    $games =  $dbSelect->getAllGamesByUid($userId);
    $gamesRenderer->setPictureLink('assets/img/games/');
    $gamesRenderer->renderGames($games);
} else {
    header('Location: http://localhost/2022/encounterGenerator/pages/authorize.php');
}
?>
</body>
</html>