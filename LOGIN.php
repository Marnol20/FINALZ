<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $mysqli = require __DIR__ . "/database.php";

    $sql = sprintf("SELECT * FROM user
            WHERE email = '%s'",
            $mysqli->real_escape_string($_POST["email"]));

    $result = $mysqli->query($sql);
    session_start();

    $user = $result->fetch_assoc();

    if ($user) {
        if ($_POST["password"] == $user["password"]) {
            $_SESSION["user_id"] = $user["id"];
            echo json_encode(["success" => true, "message" => "Login successful"]);
            exit();
        }
    }

    echo json_encode(["success" => false, "message" => "Invalid email or password"]);
    exit();
}

?>
