function update_assignment($assignment_id, $description, $course_id)
{
    global $db;
    $query = 'UPDATE assignments 
              SET Description = :description, courseID = :course_id
              WHERE ID = :assignment_id';
              
    $statement = $db->prepare($query);
    $statement->bindValue(':assignment_id', $assignment_id, PDO::PARAM_INT);
    $statement->bindValue(':description', $description, PDO::PARAM_STR);
    $statement->bindValue(':course_id', $course_id, PDO::PARAM_INT);
    $statement->execute();
    $statement->closeCursor();
}
