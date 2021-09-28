<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
    
  

    <?php
    $url = $_SERVER["REQUEST_URI"];
    $url_components = parse_url($url);
    parse_str($url_components["query"], $params);
    ?>
    <script type="text/javascript">
      let x = `<?php echo $params["imie"] .
          " " .
          "nazwisko " .
          $params["nazwisko"]; ?>`;
      document.write(x);
    </script>
  </body>
</html>
