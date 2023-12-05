<?php
$conn = new mysqli('localhost', 'root', '', 'student_detail');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);  }
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $studentIdToUpdate = 1001; // Student ID to update
    $newContactNumber = $_POST['new_contact_no'];
    if (empty($newContactNumber)) {
        echo "New contact number is required.";
    } else {
        $sqlUpdate = "UPDATE student SET phone_no = ? WHERE student_id = ?";
        $stmt = $conn->prepare($sqlUpdate);
        $stmt->bind_param("si", $newContactNumber, $studentIdToUpdate);
        if ($stmt->execute()) {
            echo "Contact number updated successfully.";
    } else {      echo "Error updating contact number: " . $stmt->error;
        }
        $stmt->close();
    }
}
$conn->close();
?>

<html>  <body>
    <form action="" method="post">
        <p>New Contact No. =    <input type="tel" name="new_contact_no" placeholder="Enter new contact number">   </p>
        <input type="submit" name="update" value="Update Contact Number">
    </form>   </body> </html>
