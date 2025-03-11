<?php
require_once('database.php');
require_once('course_db.php');

$course_id = filter_input(INPUT_GET, 'course_id', FILTER_VALIDATE_INT);

if (!$course_id) {
    die("Invalid course ID.");
}

$course_name = get_course_name($course_id);

if ($course_name === "Unknown Course") {
    die("Course not found.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $course_id = filter_input(INPUT_POST, 'course_id', FILTER_VALIDATE_INT);
    $course_name = filter_input(INPUT_POST, 'course_name', FILTER_SANITIZE_SPECIAL_CHARS);

    if ($course_id && !empty($course_name)) {
        update_course($course_id, $course_name);
        header("Location: index.php?action=list_courses");
        exit();
    } else {
        $error = "Invalid input. Please check your data.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Course</title>
</head>
<body>
    <h2>Update Course</h2>
    <form action="update_course.php" method="post">
        <input type="hidden" name="course_id" value="<?php echo htmlspecialchars($course_id); ?>">
        
        <label for="course_name">Course Name:</label>
        <input type="text" id="course_name" name="course_name" value="<?php echo htmlspecialchars($course_name); ?>" required>
        
        <button type="submit">Update Course</button>
    </form>
</body>
</html>
