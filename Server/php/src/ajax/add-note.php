<?php 
$data = $_POST;

$idNote = intval($data['noteId']);
$titleNote = $data['noteTitle'];
$dateNote = $data['noteDate'];
$textNote = $data['noteText'];

$onlyDateNote = substr($dateNote, 0, strpos($dateNote, "T"));
$onlyTimeNote = substr($dateNote, strpos($dateNote, "T")+1, strlen($dateNote));
$mysqlDate = date('Y-m-d H:i:s', strtotime($onlyDateNote.' '.$onlyTimeNote));

$host = 'db';

$user = 'root';

$pass = 'MYSQL_ROOT_PASSWORD';

$mydatabase = 'MYSQL_DATABASE';


$conn = new mysqli($host, $user, $pass, $mydatabase);

if($conn->connect_error){
    die("Ошибка: " . $conn->connect_error);
}
if ($idNote==0) {
    $sql = "INSERT INTO my_notes (title, created, content) VALUES ('$titleNote', '$mysqlDate', '$textNote')";
} else {
    $sql = "UPDATE my_notes SET title='{$titleNote}', created='{$mysqlDate}', content='{$textNote}' WHERE id='{$idNote}'";
}

if($conn->query($sql)){
    echo "Данные успешно добавлены";
} else {
    echo "Ошибка: " . $conn->error;
}
$conn->close();
?>