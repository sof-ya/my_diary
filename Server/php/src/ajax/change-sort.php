<?php
session_start();
$sort = $_POST['sort'];

$_SESSION['sort'] = $sort; 
?>