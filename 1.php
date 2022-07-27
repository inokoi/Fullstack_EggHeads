<?php
/**
 * Created by PhpStorm.
 * User: alexast
 * Date: 27.07.2022
 * Time: 03:56
 */

// 1. Опишите, какие проблемы могут возникнуть при использовании данного кода

$mysqli = new mysqli("localhost", "my_user", "my_password", "world");

// 1 нужно добавить проверку соединения
if (mysqli_connect_errno()) {
    printf("Подключение не удалось: %s\n", mysqli_connect_error());
    exit();
}

$id = $_GET['id'];
// 2 проверку id если нету тогда не выполнять запрос а вернуть ответ
if($id){
    // 3 проверка что это число
    if(is_int($id)) {
        $res = $mysqli->query('SELECT * FROM users WHERE u_id=' . $id);
        $user = $res->fetch_assoc();
    } else {
        echo 'id should be integer';
    }
} else {
    echo 'We don\'t have id';
}

// 4 закрытие соединения после выполнения запроса если он был.
$mysqli->close();