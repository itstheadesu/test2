<?php
// Include the database connection file
include 'connect.php';

// Assuming $_POST data is already available
$department = $_POST['department'];
$name = $_POST['name'];
$client_type = $_POST['client_type'];
$date = $_POST['date'];
$sex = $_POST['sex'];
$age = $_POST['age'];
$region = $_POST['region'];
$service = $_POST['service'];
$cc1 = $_POST['cc1'];
$cc2 = $_POST['cc2'];
$cc3 = $_POST['cc3'];
$likert_sqd0 = $_POST['likert_sqd0'];
$likert_sqd1 = $_POST['likert_sqd1'];
$likert_sqd2 = $_POST['likert_sqd2'];
$likert_sqd3 = $_POST['likert_sqd3'];
$likert_sqd4 = $_POST['likert_sqd4'];
$likert_sqd5 = $_POST['likert_sqd5'];
$likert_sqd6 = $_POST['likert_sqd6'];
$likert_sqd7 = $_POST['likert_sqd7'];
$likert_sqd8 = $_POST['likert_sqd8'];
$comment = $_POST['comment'];
$contact = $_POST['contact'];

// Get department ID from department name
$stmt = $conn->prepare("SELECT dept_id FROM department WHERE dept_name = :department");
$stmt->bindParam(':department', $department);
$stmt->execute();
$dept_row = $stmt->fetch();

if ($dept_row) {
    $dept_id = $dept_row['dept_id'];

    // Construct the SQL query to insert into the client table
    $stmt = $conn->prepare("INSERT INTO client (name, client_type, sex, age, region, service) VALUES (:name, :client_type, :sex, :age, :region, :service)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':client_type', $client_type);
    $stmt->bindParam(':sex', $sex);
    $stmt->bindParam(':age', $age);
    $stmt->bindParam(':region', $region);
    $stmt->bindParam(':service', $service);

    if ($stmt->execute()) {
        $client_id = $conn->lastInsertId(); // Get the auto-generated client ID

        // Construct the SQL query to insert into the control table
        $stmt = $conn->prepare("INSERT INTO control (client_id, dept_id, date, comment, contact, cc1, cc2, cc3, likert_sqd0, likert_sqd1, likert_sqd2, likert_sqd3, likert_sqd4, likert_sqd5, likert_sqd6, likert_sqd7, likert_sqd8) VALUES (:client_id, :dept_id, CURRENT_TIMESTAMP(), :comment, :contact, :cc1, :cc2, :cc3, :likert_sqd0, :likert_sqd1, :likert_sqd2, :likert_sqd3, :likert_sqd4, :likert_sqd5, :likert_sqd6, :likert_sqd7, :likert_sqd8)");
        $stmt->bindParam(':client_id', $client_id);
        $stmt->bindParam(':dept_id', $dept_id);
        $stmt->bindParam(':comment', $comment);
        $stmt->bindParam(':contact', $contact);
        $stmt->bindParam(':cc1', $cc1);
        $stmt->bindParam(':cc2', $cc2);
        $stmt->bindParam(':cc3', $cc3);
        $stmt->bindParam(':likert_sqd0', $likert_sqd0);
        $stmt->bindParam(':likert_sqd1', $likert_sqd1);
        $stmt->bindParam(':likert_sqd2', $likert_sqd2);
        $stmt->bindParam(':likert_sqd3', $likert_sqd3);
        $stmt->bindParam(':likert_sqd4', $likert_sqd4);
        $stmt->bindParam(':likert_sqd5', $likert_sqd5);
        $stmt->bindParam(':likert_sqd6', $likert_sqd6);
        $stmt->bindParam(':likert_sqd7', $likert_sqd7);
        $stmt->bindParam(':likert_sqd8', $likert_sqd8);

        if ($stmt->execute()) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $stmt->errorInfo()[2];
        }
    } else {
        echo "Error: " . $stmt->errorInfo()[2];
    }
} else {
    echo "Error: Department not found";
}

// Check if the CAPTCHA matches
if ($_POST['userCaptcha'] == $_POST['captcha']) {
    // CAPTCHA is valid, proceed with form processing
    echo "Form submitted successfully.";
} else {
    // CAPTCHA is invalid, show an error message
    echo "CAPTCHA does not match. Please try again.";
}

?>
