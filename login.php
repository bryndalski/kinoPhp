<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" />
    <title>Login</title>
</head>
<body class="--hidden">
    <div
      class="flex  container--shadow scroll--hidden flex--center container--huge"
    >
      <div class="m-center  p--small bg--login container--box flex flex--center flex--col">
       <h1>Login
        </h1>    
      <form  method="POST" class="flex flex--between flex--col">
          <div class="flex flex--row flex--between inputGroup">
            <input type="text" name="login" id="login" class="m--1" require placeholder="Login" />
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
         
          <button id="sub"  class="m--center button button--accept">Login</button>
        </form>
        <?php if (!isset($_SESSION["lang"])) {
            header("Location: http://localhost/projekt_kino/index.php");
        } else {
            if (
                isset($_POST["login"]) &&
                isset($_POST["login"]) != "" &&
                isset($_POST["password"]) &&
                isset($_POST["password"]) != ""
            ) {
                $conn = new mysqli("localhost", "root", "", "kino");

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    echo "coś poszło nie tak :(";
                }

                $result = $conn->query(
                    "select login, pass from users where login like '{$_POST["login"]}'"
                );
                if ($result["pass"]) {
                    echo $result["pass"];
                    if (password_verify($_POST["password"], $result["pass"])) {
                        session_start();
                    } else {
                        echo "<p>błędne login lub hasło</p>";
                    }
                } else {
                    echo "<p>przykro nam ale nie ma takiego użytkownika :(</p>";
                }
                $conn->close();
            }
        } ?>
      </div>
      
    </div>
  </body>
</html>



