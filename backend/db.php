<?php

$db = "mysql:host=localhost;dbname=all_j_shop_general_merchandise;";
$dbusername = "root";
$dbpassword = "";

try{

    $pdo = new PDO($db,$dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
    echo "Connection failed : " . $e->getMessage();
}