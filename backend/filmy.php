<?php
$conn = new mysqli("localhost", "root", "", "kino2");
$result = $conn->query(
    'SELECT days.name as "day", showing.hour, ( SELECT name from movies where id LIKE showing.movie ) as "film" , ( SELECT imgLink from movies where id LIKE showing.movie )as "cover" FROM showing LEFT JOIN days ON showing.day = days.id GROUP by name;'
);
$json = [];
while ($row = $result->fetch_assoc()) {
    $json[] = [
        "day" => $row["day"],
        "movie" => $row["film"],
        "time" => $row["hour"],
        "cover" => $row["cover"]
    ];
}

$jsonstring = json_encode($json);
echo $jsonstring;

?>
