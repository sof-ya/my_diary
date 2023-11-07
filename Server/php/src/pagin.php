<?php 

function pagePrint($page, $title, $show, $active_class = 'pagin__page-active') {
    if($show) {
        ?><a class = "pagin__page" href="?page=<?= $page?>"><?=$title ?></a><?
    } else {
        if(!empty($active_class)) $active = 'class="pagin__page ' . $active_class . '"';
        ?><span <?=$active?>><?=$title ?></span><?
    }
    return false;
}

if(!empty($_GET['page'])) {
    $page = (int) $_GET['page'];
}
else if(empty($page)) {
    $page = 1;
}  

$conn = new mysqli($host, $user, $pass, $mydatabase);

$res = $conn->query("SELECT count(*) AS count FROM my_notes");
$row = mysqli_fetch_array($res, MYSQLI_BOTH);
$page_count = ceil($row['count'] / $page_setting['limit']); 
$page_left = $page - $page_setting['show']; 
$page_right = $page + $page_setting['show']; 
$page_prev = $page - 1; 
$page_next = $page + 1; 
if($page_left < 2) $page_left = 2; 
if($page_right > ($page_count - 1)) $page_right = $page_count - 1; 
if($page > 1) $page_setting['prev_show'] = 1; 
if($page != 1) $page_setting['first_show'] = 1; 
if($page < $page_count) $page_setting['next_show'] = 1; 
if($page != $page_count) $page_setting['last_show'] = 1;

$conn->close();

if ($page_count>=1) {
?>
<div class="pagin__wrapper">
    <?if ($page_setting['last_show']) {?>
        <script type="module" src="./scripts/show-more.js"></script>
        <button id = "show-more-btn" data-page = "<?=$page?>" class = "pagin__button"><span>Показать больше</span></button>
    <?
    }?>
    <div class="pagin__pagin-wrapper"><?
    pagePrint($page_prev, $page_setting['prev_text'], $page_setting['prev_show']);
    pagePrint(1, 1, $page_setting['first_show'], $page_setting['class_active']);
    if($page_left > 2) echo $page_setting['separator'];
    for($i = $page_left; $i <= $page_right; $i++) {
        $page_show = 1;
        if($page == $i) $page_show = 0;
        pagePrint($i, $i, $page_show, $page_setting['class_active']);
    }
    if($page_right < ($page_count - 1)) echo $page_setting['separator'];
    if($page_count != 1) pagePrint($page_count, $page_count, $page_setting['last_show'], $page_setting['class_active']);
    pagePrint($page_next, $page_setting['next_text'], $page_setting['next_show']);

?></div></div> 



<?}