<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "itlab_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? '';
    $rollno = $_POST['rollno'] ?? '';
    $address = $_POST['address'] ?? '';
    $dob = !empty($_POST['dob']) ? $_POST['dob'] : NULL;
    $email = $_POST['email'] ?? '';
    $city = $_POST['city'] ?? '';
    $gender = $_POST['gender'] ?? '';
    
    $hs_institution = $_POST['hs_institution'] ?? '';
    $hs_pass_year = $_POST['hs_pass_year'] ?? '';
    
    $edu_ba = $_POST['edu_ba'] ?? 'no';
    $ba_institution = $_POST['ba_institution'] ?? '';
    $ba_pass_year = $_POST['ba_pass_year'] ?? '';
    
    $edu_bsc = $_POST['edu_bsc'] ?? 'no';
    $bsc_institution = $_POST['bsc_institution'] ?? '';
    $bsc_pass_year = $_POST['bsc_pass_year'] ?? '';
    
    $edu_bcom = $_POST['edu_bcom'] ?? 'no';
    $bcom_institution = $_POST['bcom_institution'] ?? '';
    $bcom_pass_year = $_POST['bcom_pass_year'] ?? '';
    
    $feedback = $_POST['feedback'] ?? '';

    $stmt = $conn->prepare("INSERT INTO students (name, rollno, address, dob, email, city, gender, hs_institution, hs_pass_year, edu_ba, ba_institution, ba_pass_year, edu_bsc, bsc_institution, bsc_pass_year, edu_bcom, bcom_institution, bcom_pass_year, feedback) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }
    
    $stmt->bind_param("sssssssssssssssssss", $name, $rollno, $address, $dob, $email, $city, $gender, $hs_institution, $hs_pass_year, $edu_ba, $ba_institution, $ba_pass_year, $edu_bsc, $bsc_institution, $bsc_pass_year, $edu_bcom, $bcom_institution, $bcom_pass_year, $feedback);

    if ($stmt->execute()) {
        echo "<h2>New record created successfully</h2>";
        echo "<br><a href='index.html'>Go back to form</a>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>
