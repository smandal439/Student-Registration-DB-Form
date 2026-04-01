<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS itlab_db";
if ($conn->query($sql) === TRUE) {
  echo "Database itlab_db ensured to exist.<br>";
} else {
  die("Error creating database: " . $conn->error . "<br>");
}

$conn->select_db("itlab_db");

// sql to create table
$sql = "CREATE TABLE IF NOT EXISTS students (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  rollno VARCHAR(30),
  address VARCHAR(255),
  dob DATE,
  email VARCHAR(100),
  city VARCHAR(50),
  gender VARCHAR(10),
  hs_institution VARCHAR(100),
  hs_pass_year VARCHAR(10),
  edu_ba VARCHAR(10),
  ba_institution VARCHAR(100),
  ba_pass_year VARCHAR(10),
  edu_bsc VARCHAR(10),
  bsc_institution VARCHAR(100),
  bsc_pass_year VARCHAR(10),
  edu_bcom VARCHAR(10),
  bcom_institution VARCHAR(100),
  bcom_pass_year VARCHAR(10),
  feedback TEXT,
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table students created successfully.<br>";
} else {
  echo "Error creating table: " . $conn->error . "<br>";
}

echo "<br><a href='index.html'>Go back to the form</a>";

$conn->close();
?>
