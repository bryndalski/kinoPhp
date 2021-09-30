<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="scss/css/header.css" />
    <link rel="stylesheet" href="scss/css/styles.css" />

    <title>Login</title>
</head>
<body >
  <header>
      <a href="/kino">
        <h2>Kocur kino</h2>
        <img src="/kino/img/cinemaLogo.gif" alt="" />
      </a>
      <div class="d--flex flex--row">
        <a class="btn btn--orange" href="register.php">Zarejestruj sie</a>
        <a class="btn btn--orange"
        <?php include "./backend/isLogged.php"; ?>
        </a>
      </div>
    </header>

    <div class="m--center w--content m--mt3">
      <h1 class="text--orange w--content text--center">Login</h1>
      <div>
        <form method="POST" class="flex flex--between flex--col">
          <div class="flex flex--row flex--between inputGroup">
            <input
              type="text"
              name="login"
              id="login"
              class="m--1"
              require
              placeholder="Login"
            />
          </div>
          
          <div class="flex flex--row flex--between inputGroup">
            <input
              class="m--1"
              id="ps1"
              name="password"
              type="password"
              placeholder="Password"
              require
            />
          </div>
         
          <button
            name="register"
            id="sub"
            class="m--center d--block button button--accept"
          >
            Zaloguj
          </button>
        </form>
       <?php include "./backend/login.php"; ?>
      </div>
      
    </div>
  </body>
</html>



