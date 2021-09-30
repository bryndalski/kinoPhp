  <?php
  session_start();
  if (!isset($_SESSION["login"])) {
      header("Location: /kino/login.php");
  }

  $url = $_SERVER["REQUEST_URI"];
  $url_components = parse_url($url);
  parse_str($url_components["query"], $params);
  echo $params["movie"] . " o godzinie " . $params["time"];
  ?>    ?>