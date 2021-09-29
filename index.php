<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dostępne Seanse</title>
    <link rel="stylesheet" href="scss/css/header.css" />
    <link rel="stylesheet" href="scss/css/styles.css" />
    <script defer src="js/renderPage.js"></script>
  </head>
  <body>
    <header>
      <a href="/kino">
        <h2>Kocur kino</h2>
        <img src="/kino/img/cinemaLogo.gif" alt="" />
      </a>
      <div class="d--flex flex--row">
        <a class="btn btn--orange" href="register.php">Zarejestruj sie</a>
        <a class="btn btn--orange" href="login.php"><?php if (
            !isset($_SESSION["lang"])
        ) {
            echo "zaloguj się";
        } else {
            echo "Wyloguj się";
        } ?></a>
      </div>
    </header>

    <div class="cinemaMovies"></div>
  </body>
</html>
