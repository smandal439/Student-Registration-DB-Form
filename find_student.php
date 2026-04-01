<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Find Student Details</title>
  <link rel="stylesheet" href="css/style.css" />
</head>
<body>
  <div class="container">
    <h1>Find Student Details</h1>
    <div class="search-box">
      <form action="find_student.php" method="GET">
        Search by Roll No: 
        <input type="text" name="search_roll" placeholder="Enter Roll No" required>
        <input type="submit" value="Search">
      </form>
    </div>
    
    <a href="index.html">Back to Registration Form</a>
    <hr>

    <?php
    if (isset($_GET['search_roll']) && !empty($_GET['search_roll'])) {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "itlab_db";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $search_roll = $_GET['search_roll'];
        $stmt = $conn->prepare("SELECT * FROM students WHERE rollno = ?");
        $stmt->bind_param("s", $search_roll);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<h2>Search Results:</h2>";
            while($row = $result->fetch_assoc()) {
                echo "<h3>" . htmlspecialchars($row['name']) . "'s Details</h3>";
                echo "<table>";
                echo "<tr><th>Roll No</th><td>" . htmlspecialchars($row['rollno']) . "</td></tr>";
                echo "<tr><th>Email</th><td>" . htmlspecialchars($row['email']) . "</td></tr>";
                echo "<tr><th>Address</th><td>" . htmlspecialchars($row['address']) . "</td></tr>";
                echo "<tr><th>Date of Birth</th><td>" . htmlspecialchars($row['dob']) . "</td></tr>";
                echo "<tr><th>City</th><td>" . htmlspecialchars($row['city']) . "</td></tr>";
                echo "<tr><th>Gender</th><td>" . htmlspecialchars($row['gender']) . "</td></tr>";
                
                if(!empty($row['hs_institution'])) {
                  echo "<tr><th>H.S Institution</th><td>" . htmlspecialchars($row['hs_institution']) . " (Passed: " . htmlspecialchars($row['hs_pass_year']) . ")" . "</td></tr>";
                }
                if($row['edu_ba'] == 'yes' && !empty($row['ba_institution'])) {
                  echo "<tr><th>B.A Institution</th><td>" . htmlspecialchars($row['ba_institution']) . " (Passed: " . htmlspecialchars($row['ba_pass_year']) . ")" . "</td></tr>";
                }
                if($row['edu_bsc'] == 'yes' && !empty($row['bsc_institution'])) {
                  echo "<tr><th>B.Sc Institution</th><td>" . htmlspecialchars($row['bsc_institution']) . " (Passed: " . htmlspecialchars($row['bsc_pass_year']) . ")" . "</td></tr>";
                }
                if($row['edu_bcom'] == 'yes' && !empty($row['bcom_institution'])) {
                  echo "<tr><th>B.Com Institution</th><td>" . htmlspecialchars($row['bcom_institution']) . " (Passed: " . htmlspecialchars($row['bcom_pass_year']) . ")" . "</td></tr>";
                }
                if(!empty($row['feedback']) && trim($row['feedback']) !== 'Default text can go here.') {
                  echo "<tr><th>Feedback</th><td>" . nl2br(htmlspecialchars(trim($row['feedback']))) . "</td></tr>";
                }
                echo "<tr><th>Registration Date</th><td>" . htmlspecialchars($row['reg_date']) . "</td></tr>";
                echo "</table><br>";
            }
        } else {
            echo "<p>No student found with Roll No: <strong>" . htmlspecialchars($search_roll) . "</strong></p>";
        }
        
        $stmt->close();
        $conn->close();
    }
    ?>
  </div>
</body>
</html>
