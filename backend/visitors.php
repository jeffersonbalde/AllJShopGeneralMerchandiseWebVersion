<?php

require_once "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];

    try {
        // $query = "INSERT INTO visitors(name) VALUES(?);";
        $query = "INSERT INTO visitors(name) VALUES(:name);";

        $statement = $pdo->prepare($query);
        $statement->bindParam(":name", $name);
        $statement->execute();

        // $statement->execute([$name]);

        $pdo = null;
        $statement = null;

        header("Location: ../frontend/login.php?name=" . urlencode($name));
        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}
?>
