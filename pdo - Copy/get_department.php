<?php
// Include the database connection file
include 'connect.php';

// Fetch department names
$sql = "SELECT dept_name FROM department WHERE dept_id > 0 ORDER BY dept_name ASC";
$result = $conn->query($sql);

$departments = array();
if ($result->rowCount() > 0) {
    $departments = $result->fetchAll(PDO::FETCH_COLUMN, 0);
}

// Output departments as JSON
header("Content-Type: application/json");
echo json_encode($departments);

// Close connection
$conn = null;
?>
