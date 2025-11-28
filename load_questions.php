<?php
include "db_connect.php";

$q = mysqli_query($conn, "SELECT * FROM expert_questions ORDER BY id DESC");

while($row = mysqli_fetch_assoc($q)){
    echo "<div class='question-box'>";
    echo "<strong>".$row['name']."</strong> asked:<br>";
    echo "<p>".$row['question']."</p>";
    echo "</div><br>";
}
?>
