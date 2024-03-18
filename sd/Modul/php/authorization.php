<?php

$host='localhost';
$databse='seti_comment';
$user='root';
$password='';

$conn=mysqli_connect($host, $user, $password, $databse) or die("ошибка". mysqli_error($conn));

if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

$login = $_POST['login'];
$password = $_POST['password'];

$sql = "SELECT ID, Ima FROM polzovatel WHERE login = '$login' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    session_start();
    $_SESSION['ID'] = $user['ID'];
    $_SESSION['Ima'] = $user['Ima'];
     echo "Авторизация успешна! Добро пожаловать, " . $user['Ima'] . "!";
    print("<a href='./../home.html'>TUK</a>");
} else {
    echo "Неверный логин или пароль. Попробуйте снова.";
}

$conn->close();
?>