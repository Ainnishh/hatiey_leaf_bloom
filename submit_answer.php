<?php
include "db_connect.php";

$question_id = $_POST['question_id'];
$name = $_POST['name'];
$answer = $_POST['answer'];

if(empty($name) || empty($answer)){
    die("error:empty");
}

$stmt = $conn->prepare("
    INSERT INTO expert_answers(question_id, answer_name, answer)
    VALUES(?, ?, ?)
");

$stmt->bind_param("iss", $question_id, $name, $answer);

if ($stmt->execute()){
    echo "success";
} else {
    echo "error:db";
}

$stmt->close();
$conn->close();
?>
