<?php
include "db_connect.php";

if(isset($_POST['name']) && isset($_POST['question'])){
    
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $question = mysqli_real_escape_string($conn, $_POST['question']);

    $sql = "INSERT INTO expert_questions (name, question)
            VALUES ('$name', '$question')";

    if(mysqli_query($conn, $sql)){
        echo "success";
    } else {
        echo "error";
    }
}
?>
