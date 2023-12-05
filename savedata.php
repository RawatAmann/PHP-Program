<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "student_detail";
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $studentId = $_POST['student_id'];
    $studentName = $_POST['name_'];
    $contactNumber = $_POST['phone_no'];
    if (empty($studentId) || empty($studentName) || empty($contactNumber)) {
        echo "All fields are required.";
    } else {
        $sqlInsert = "INSERT INTO student (student_id, name_, phone_no) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sqlInsert);
        $stmt->bind_param("ssi", $studentId, $studentName, $contactNumber);
        if ($stmt->execute()) {
            echo "Student information saved successfully.";
        } else {
            echo "Error saving student information: " . $stmt->error;
        }
        $stmt->close();
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html><head>
    <title>aman</title>
</head>
<body>
    <form action="" method="post">
        <p>Student ID = 
            <input type="text" name="student_id" placeholder="Enter student ID">
        </p>
        <p>Name = 
            <input type="text" name="name_" placeholder="Enter your name">
        </p>
        <p>Phone No. = 
            <input type="tel" name="phone_no" placeholder="Enter phone no">
        </p>
        
        <input type="submit" name="save" value="Submit">
    </form>

</body>
</html>
