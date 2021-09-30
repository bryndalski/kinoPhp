<?php
$url = $_SERVER["REQUEST_URI"];
$url_components = parse_url($url);
parse_str($url_components["query"], $params);
$conn = new mysqli("localhost", "root", "", "kino2");

$qry = "SELECT
    (
    SELECT
        users.login
    FROM
        users
    WHERE
        users.id LIKE reservations.user
) AS user,
row,
sit
FROM
    reservations
WHERE
    reservations.showing LIKE(
    SELECT
        showing.id
    FROM
        showing
    WHERE
        movie LIKE(
        SELECT
            movies.ID
        FROM
            movies
        WHERE
            movies.name LIKE '{$params["movie"]}'
    ) AND showing.hour LIKE '{$params["time"]}' AND showing.day LIKE(
        (
        SELECT
            days.id
        FROM
            days
        WHERE
            days.name LIKE '{$params["day"]}'
    )
    )
)";
$result = $conn->query($qry);
$json = [];
while ($row = $result->fetch_assoc()) {
    $json[] = [
        "user" => $row["user"],
        "row" => $row["row"],
        "sit" => $row["sit"],
    ];
}

$jsonstring = json_encode($json);
echo $jsonstring;

?>
