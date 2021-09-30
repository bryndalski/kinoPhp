  <?php
  session_start();
  if (!isset($_SESSION["login"])) {
      echo "href='/kino/login.php'> zaloguj się";
  } else {
      echo "href='/kino/backend/bajo.php'> Wyloguj się";
  }


?>
