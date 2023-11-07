<?php
session_start();


if(empty($_SESSION['sort'])) {
    $_SESSION['sort'] = "DESC";
}


$host = 'db';

$user = 'root';

$pass = 'MYSQL_ROOT_PASSWORD';

$mydatabase = 'MYSQL_DATABASE';

$conn = new mysqli($host, $user, $pass, $mydatabase);

$createTableSelect = "CREATE TABLE IF NOT EXISTS my_notes (
    id INT NOT NULL AUTO_INCREMENT,
    PRIMARY KEY(id),
    title VARCHAR(200) NOT NULL,
    created DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL,
    content TEXT NOT NULL)";

if($conn->query($createTableSelect)){
    
} else {
    echo "Ошибка: " . $conn->error;
}

$conn->close();

date_default_timezone_set('Europe/Moscow'); 

include('header.php')
?>
    <main>
        <section class = "main__top">
            <?php include('main-top.php') ?>
        </section>

        <section class="notes">
            <div class="notes__notes-container">
                <?php include('notes-block.php') ?>
            </div>
        </section>

        <section class="pagin">
            <?php include('pagin.php') ?>
        </section>
    </main>

    <footer>
        <div class="footer__text-wrapper">
            <div class="footer__text">Мой Дневничок</div>
        </div>
        <a class = "up-link" href="#">
            <button class = "up-button">
                <div class="up-button__wrapper">
                    <div class="icon icon-arrow-up"></div>
                    <span>Наверх</span>
                </div>
            </button>
        </a>
    </footer>
    
    <script type="module" src="./scripts/scripts.js"></script>

    <?php include('create-modal.php') ?>
</body>
</html>