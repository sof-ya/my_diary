<?php function sortingButtons() {
    
}
?>


<div class="main__top-wrapper">
    <div class="main__title">Мой дневничок</div>
    <div class="main__group-sort-buttons">
        <button data-sort = "DESC" class = "main__sort-button <?
        if ($_SESSION['sort']==="DESC") {
        ?> main__sort-button-active <? }?> main__new-sorting-button">
            <div class="main__sort-button-inner">
                <div class="icon icon-sort-new"></div>
                <span>Сначала новые</span>
            </div>
        </button>
        <button data-sort = "ASC" class = "main__sort-button <?
        if ($_SESSION['sort']==="ASC") {
        ?> main__sort-button-active <? }?> main__old-sorting-button">
            <div class="main__sort-button-inner">
                <div class="icon icon-sort-old"></div>
                <span>Сначала старые</span>
            </div>
        </button>
    </div>
</div>