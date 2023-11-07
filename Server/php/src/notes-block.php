<?php 
include('grid-notes-template.php');

$page_setting = [
    'limit' => 6, 
    'show'  => 2, 
    'prev_show' => 0, 
    'next_show' => 0, 
    'first_show' => 0, 
    'last_show' => 0, 
    'prev_text' => '<div class="icon-arrow icon-arrow-left pagin__arrow-left"></div>',
    'next_text' => '<div class="icon-arrow icon-arrow-right pagin__arrow-right"></div>',
    'class_active' => 'pagin__page-active',
    'separator' => ' ... ',
];

if(!empty($_GET['page'])) {
    $page = (int) $_GET['page'];
}
else if(empty($page)) {
    $page = 1;
}  

$start = ($page-1)*$page_setting['limit'];

$conn = new mysqli($host, $user, $pass, $mydatabase);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    $res = $conn->query("SELECT * FROM my_notes ORDER BY created {$_SESSION['sort']} LIMIT {$start},{$page_setting['limit']}");
} 

$conn->close();

if ($res->num_rows > 0) {
    while($row = mysqli_fetch_array($res, MYSQLI_BOTH)) {
        showCard($row);      
    }
} 
    else {
    ?>
        <div class="notes__placeholder-empty-notes">
            Вы пока не добавили ни одной заметки.
        </div>  
    <?
}