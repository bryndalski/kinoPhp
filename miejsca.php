<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <link rel="stylesheet" href="scss/css/header.css" />
    <link rel="stylesheet" href="scss/css/styles.css" />
    <script defer src="/kino/js/room.js"></script>
    <title>Wybierz miejsca na seans</title> 
  </head>
  <body>
    <h1 class="text--orange m--0 text--center">Wybierz miejsca na seans : <?php include "./backend/rilmReader.php"; ?></h1>
    <div class="screen"> </div>
    <div class="container"></div>
    <button class="btn btn--orange m--center d--block">Zarezerwuj</button>
  </body>
</html>
