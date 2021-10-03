<?php
session_start();

$DATA = json_decode(file_get_contents("php://input"), true);

if (isset($DATA["reserved"])) {
    session_start();
    if (!isset($_SESSION["login"])) {
        header("Location: /kino/login.php");
    }
    $DATA = $DATA["reserved"];
    $url = $_SERVER["REQUEST_URI"];
    $url_components = parse_url($url);
    parse_str($url_components["query"], $params);

    $conn = new mysqli("localhost", "root", "", "kino2");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $query =
        "INSERT INTO `reservations`(`user`, `showing`, `row`, `sit`) VALUES";
    for ($i = 0; $i < count($DATA); $i++) {
        $query =
            $query .
            "(
    (
    SELECT
        users.id
    FROM
        users
    WHERE
        users.login LIKE '{$_SESSION["user"]}'
),
(SELECT
    id
FROM
    showing
WHERE
    showing.day LIKE(
    SELECT
        id
    FROM
        days
    WHERE
        days.name LIKE '{$params["day"]}'
) AND showing.hour LIKE '{$params["time"]}' AND showing.movie LIKE(
    SELECT
        id
    FROM
        movies
    WHERE
        movies.name LIKE '{$params["movie"]}'
)),
'{$DATA[$i]["row"]}',
'{$DATA[$i]["sit"]}'
)";
        if ($i == count($DATA) - 1) {
            $query = $query . ";";
        } else {
            $query = $query . ",";
        }
    }
    $conn->query($query);
    echo "{success:true}";
} else {
    echo "Noooooooob";
}
?>
