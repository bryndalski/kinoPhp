 <?php if (
     isset($_POST["login"]) &&
     isset($_POST["login"]) != "" &&
     isset($_POST["password"]) &&
     isset($_POST["password"]) != ""
 ) {
     $conn = new mysqli("localhost", "root", "", "kino2");

     // Check connection
     if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
         echo "<p class='text--orange'> coś poszło nie tak :( </p>";
     }

     $res = $conn->query(
         "select login, pass from users where login like '{$_POST["login"]}'"
     );
     $result = [];

     while ($row = $res->fetch_assoc()) {
         $result["pass"] = $row["pass"];
         $result["login"] = $row["login"];
     }
     if (isset($result["pass"]) == 1) {
         if (password_verify($_POST["password"], $result["pass"])) {
             session_start();
             $_SESSION["login"] = true;
             $_SESSION["user"] = $result["login"];
             header("Location: /kino");
             echo "<p class='text--orange' >Zalogowano poprawnie: witaj {$_POST["login"]}</p>";
         } else {
             echo "<p class='text--orange' >błędne login lub hasło</p>";
         }
     } else {
         echo "<p class='text--orange' >przykro nam ale nie ma takiego użytkownika :(</p>";
     }
     $conn->close();
 } ?>
