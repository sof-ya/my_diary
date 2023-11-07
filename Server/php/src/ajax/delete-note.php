<?php 
$data = $_POST;

$idNote = intval($data['noteId']);

$host = 'db';

$user = 'root';

$pass = 'MYSQL_ROOT_PASSWORD';

$mydatabase = 'MYSQL_DATABASE';


$conn = new mysqli($host, $user, $pass, $mydatabase);

if($conn->connect_error){
    die("Ошибка: " . $conn->connect_error);
}

$sql = "DELETE FROM my_notes WHERE id = '{$idNote}'";

if($conn->query($sql)){
    echo "Данные успешно удалены";
} else {
    echo "Ошибка: " . $conn->error;
}
$conn->close();
?>

