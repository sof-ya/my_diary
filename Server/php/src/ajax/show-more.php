<?php 
session_start();
include('../grid-notes-template.php');

$page = intval(($_GET['page']));

$lim = 6;
$start = $page*$lim;

$host = 'db';

$user = 'root';

$pass = 'MYSQL_ROOT_PASSWORD';

$mydatabase = 'MYSQL_DATABASE';

$conn = new mysqli($host, $user, $pass, $mydatabase);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    $res = $conn->query("SELECT * FROM my_notes ORDER BY created {$_SESSION['sort']} LIMIT {$start},{$lim}");
} 

$conn->close();

$arCards = [];

while($row = mysqli_fetch_array($res)) {
    array_push($arCards, showCard($row));          
}


return $arCards;