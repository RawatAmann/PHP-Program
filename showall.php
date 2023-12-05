<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "student_detail";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sqlSelect = "SELECT * FROM student";
$result = $conn->query($sqlSelect);

if ($result->num_rows > 0) {
    // Output data of each row
    echo "<h2>Student Details:</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Student ID</th><th>Name</th><th>Contact Number</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["student_id"] . "</td><td>" . $row["name_"] . "</td><td>" . $row["phone_no"] . "</td></tr>";
    }

    echo "</table>";
} else {
    echo "No student details found.";
}
$conn->close();
?>
