<?php
require_once('database.php');
require_once('assignment_db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $assignment_id = filter_input(INPUT_POST, 'assignment_id', FILTER_VALIDATE_INT);
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
    $course_id = filter_input(INPUT_POST, 'course_id', FILTER_VALIDATE_INT);

    if ($assignment_id && $description && $course_id) {
        update_assignment($assignment_id, $description, $course_id);
        header("Location: index.php"); // Redirect to assignment list or homepage
        exit;
    } else {
        echo "Invalid input. Please check your data.";
    }
}
?>
