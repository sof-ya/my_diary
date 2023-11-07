<?php 
function showCard($row) { ?>
<a class = "note-detail" href="?noteId=<?=$row["id"]?>">
<div class="notes__note-wrapper" data-id = "<?=$row["id"]?>" data-created = "<?=$row["created"]?>">
        <div class="notes__note-title">
            <?=$row["title"]?>
        </div>
        <div class="notes__note-text">
            <?=$row["content"]?>
        </div>
        <div class="notes__note-date-wrapper">
            <div class="notes__note-date">
                <div class="icon icon-date"></div>
                <span>
                    <?=
                    date('d.m.Y', strtotime($row["created"]))?>
                </span>
            </div>
            <div class="notes__note-time">
                <div class="icon icon-time"></div>
                <span>
                    <?=date('H:i', strtotime($row["created"]))?>
                </span>
            </div>
        </div>
    </div>
</a>      
<?}


?>
