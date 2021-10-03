   <?php if (
       isset($_POST["login"]) &&
       isset($_POST["login"]) != "" &&
       isset($_POST["register"]) &&
       isset($_POST["phone"]) &&
       isset($_POST["password"]) &&
       isset($_POST["confirmPass"]) &&
       $_POST["password"] == $_POST["confirmPass"]
   ) {
       $conn = new mysqli("localhost", "root", "", "kino2");

       // Check connection
       if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
       }
       $hash_pass = password_hash($_POST["password"], PASSWORD_DEFAULT);
       $result = $conn->query(
           "select login,phone from users where login like '{$_POST["login"]}' or phone like '{$_POST["phone"]}'"
       );
       if ($result->num_rows > 0) {
           echo "<p class='text--orange'>Użytkownik o takim numerze telefonu lub loginie już istnieje</p>";
       } else {
           if (
               $conn->query(
                   "INSERT INTO users(login, phone, pass) VALUES ('{$_POST["login"]}','{$_POST["phone"]}','{$hash_pass}');"
               ) === true
           ) {
               echo "<p class='text--orange'>Użytkownik dodany: zaloguj się {$_POST["login"]}</p>";
           }
       }
       $conn->close();
   } ?>
