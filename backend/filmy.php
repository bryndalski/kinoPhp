<?php
$conn = new mysqli("localhost", "root", "", "kino2");
$result = $conn->query(
    'SELECT showing.hour as "hour",(SELECT name FROM days WHERE days.id LIKE showing.day) as "day",(SELECT movies.name FROM movies WHERE movies.ID LIKE showing.movie) as "film",(SELECT movies.imgLink FROM movies WHERE movies.ID LIKE showing.movie) as "cover" FROM showing'
);
$json = [];
while ($row = $result->fetch_assoc()) {
    $json[] = [
        "day" => $row["day"],
        "movie" => $row["film"],
        "time" => $row["hour"],
        "cover" => $row["cover"],
    ];
}

$jsonstring = json_encode($json);
echo $jsonstring;

?>
