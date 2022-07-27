<?php
/**
 * Created by PhpStorm.
 * User: alexast
 * Date: 27.07.2022
 * Time: 03:56
 */

//2. Сделайте рефакторинг
$questionsQ = $mysqli->query('SELECT * FROM questions WHERE catalog_id=' . $catId);
$result = array();

while ($question = $questionsQ->fetch_assoc()) {
    $userQ = $mysqli->query('SELECT name, gender FROM users WHERE id=' . $question['user_id']);
    $user = $userQ->fetch_assoc();
    $result[] = array('question' => $question, 'user' => $user);
    $userQ->free();
}
$questionsQ->free();

// Ответ:
$result = array();
if ($catId) {
    $query = 'SELECT * FROM questions WHERE catalog_id=' . $catId;
    $questionsQ = $mysqli->query($query);
    if (!$questionsQ) {
        echo "Could not successfully run query ($query) from DB: " . mysql_error();
        exit;
    }
    while ($question = $questionsQ->fetch_assoc()) {
        if ($question['user_id']) {
            $userQuery = 'SELECT name, gender FROM users WHERE id=' . $question['user_id'];
            $userQ = $mysqli->query($userQuery);
            $user = $userQ->fetch_assoc();
            $result[] = array(
                'question' => $question,
                'user' => $user);
        }
    }
    $questionsQ->free();
    $mysqli->close();
}
print_r($result);
