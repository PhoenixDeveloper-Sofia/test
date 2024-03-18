<?php

$host='localhost';
$databse='seti_comment';
$user='root';
$password='';

$conn=mysqli_connect($host, $user, $password, $databse) or die("ошибка". mysqli_error($conn));

if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}


$ima = $_POST['Ima'];
$email = $_POST['email'];
$login = $_POST['login'];
$password = $_POST['password'];


$sql = "INSERT INTO polzovatel (ID, Ima, email, login, password) VALUES ('','$ima', '$email', '$login','$password')";

if ($conn->query($sql) === TRUE) {
    echo "Пользователь успешно зарегистрирован! Добро пожаловать, " . $ima . "!";
    print("<a href='./../index.html'>TUK</a>");
} else {
    echo "Ошибка: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>