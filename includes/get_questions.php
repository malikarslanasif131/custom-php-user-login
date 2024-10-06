<?php
include 'db.php'; // Include database connection

// Fetch security questions from the database
$sql = "SELECT id, question FROM security_questions";
$result = mysqli_query($conn, $sql);

$questions = [];

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $questions[] = $row;
    }
}

// Return JSON-encoded questions
header('Content-Type: application/json');
echo json_encode($questions);
?>