<?php
session_start();
print_r($_POST);
print_r($_GET);

if (isset($_POST["reserved"])) {
    $json = $_POST["reserved"];
    var_dump(json_decode($json, true));
    echo $json;
} else {
    echo "Noooooooob";
}
?>
