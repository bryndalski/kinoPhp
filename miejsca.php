<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <link rel="stylesheet" href="scss/css/header.css" />
    <link rel="stylesheet" href="scss/css/styles.css" />
    <title>Wybierz miejsca na seans</title> 
  </head>
  <body>
      <?php
      session_start();
      if (!isset($_SESSION["login"])) {
          header("Location: /kino/login.php");
      }

      $url = $_SERVER["REQUEST_URI"];
      $url_components = parse_url($url);
      parse_str($url_components["query"], $params);
      ?>
        <h1 class="text--orange m--0 text--center">Wybierz miejsca na seans : <?php echo $params[
            "movie"
        ] .
            " o godzinie " .
            $params["time"]; ?></h1>
    <div class="screen"> </div>
    <div class="container"></div>
    <script type="text/javascript">
      let x = `<?php echo $params["time"] .
          " " .
          "day" .
          $params["day"] .
          $params["movie"]; ?>`;
      console.log(x);
    </script>
  </body>
</html>
