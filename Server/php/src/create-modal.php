<?php 
$noteId = 0;
$noteTitle = '';
$noteDate = date('Y-m-d').'T'.date('H:i');
$noteText = '';
$titleText = "Новая запись";
$deleteBtn = "";

if(!empty($_GET["noteId"])) {
    
    $host = 'db';

    $user = 'root';

    $pass = 'MYSQL_ROOT_PASSWORD';

    $mydatabase = 'MYSQL_DATABASE';

    $conn = new mysqli($host, $user, $pass, $mydatabase);


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        $res = $conn->query("SELECT * FROM my_notes WHERE id = {$_GET['noteId']}");
    } 

    $conn->close();

    while($row = mysqli_fetch_array($res)) {
        $noteId = $row['id'];          
        $noteTitle = $row['title'];  
        $noteDate = $row['created'];  
        $noteText = $row['content'];  
    }
    $titleText = "Отредактировать запись";
    $deleteBtn = "<a class = 'modal__delete-note' href='?noteId='><div class = 'modal__delete-note-js'>Удалить заметку</div></a>
    <script type='module' src='./scripts/delete.js'></script>";
    ?>
    <div id="create-modal" class="modal" style="display: block">
    <?
} else { ?>
<div id="create-modal" class="modal">
<?}

?>
    <div class="modal__wrapper">
        <a href="?noteId=">
            <div class="mobal__close-btn icon-close"></div>
        </a>
        <div class="modal__title"><?=$titleText?></div>
        <div class="modal__top-inputs_wrapper">
        <input id = "id-input" type="hidden" value = "<?=$noteId?>"/>
            <div class="modal__input-textarea-wrapper">
                <div class="modal__top-input-textarea">
                    <label for="title-input">Заголовок</label>
                    <div class="modal__error-text">
                    </div>
                </div>
                <input id = "title-input" type="text" value = "<?=$noteTitle?>"/>
            </div>   
            <div class="modal__input-textarea-wrapper">
                <div class="modal__top-input-textarea">
                    <label for="datetime-input">Дата</label>
                    <div class="modal__error-text">
                    </div>
                </div>
                <input id = "datetime-input" type="datetime-local" value = "<?=$noteDate?>"/>
            </div>
        </div>
        <div class="modal__textarea-wrapper">
            <div class="modal__input-textarea-wrapper">
                <div class="modal__top-input-textarea">
                    <label for="note-textarea">Заметка</label>
                    <div class="modal__error-text">
                    </div>
                </div>
                <textarea id = "note-textarea"><?=$noteText?></textarea>
            </div>
        </div>
        <div class="modal__bottom-wrap">
                <button class = "modal__add-button"><span>Поделиться наболевшим</span></button>
            <?=$deleteBtn?>
        </div>
    </div>
</div>

<script type="module" src="./scripts/modal.js"></script>