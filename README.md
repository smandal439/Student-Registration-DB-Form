# Student Registration & Database Verification Form

A modern, responsive web application for registering students and looking up their details. Built with HTML, CSS (Vanilla), PHP, and MySQL.

## Features

- **Responsive Registration Form**: A beautiful, glassmorphism-inspired UI to collect student details (Name, Roll No, Address, DOB, etc.).
- **Database Initialization Script**: A built-in `setup_db.php` script that automatically creates the `itlab_db` database and `students` table, eliminating manual setup.
- **Secure Data Handling**: Utilizes PHP MySQLi Prepared Statements to securely insert user data and prevent SQL injection attacks.
- **Search Functionality**: A dedicated `find_student.php` page allowing users to search for and view a student's full registration details by entering their Roll Number.
- **Modern UI Aesthetic**: Employs CSS variables, the Inter font, and CSS layout techniques for a clean, premium visual experience.

## Setup Instructions (Local)

1. Ensure you have **XAMPP** installed. Open the XAMPP Control Panel and start the **Apache** and **MySQL** services.
2. Clone or place this project folder inside your `C:\xampp\htdocs\` directory.
3. Open your web browser and navigate to `http://localhost/ITLab/Form/setup_db.php`. This will automatically set up the required MySQL database and tables.
4. Next, visit `http://localhost/ITLab/Form/index.html` to view and interact with the registration form!
5. To test the search feature, click the link on the registration page or navigate directly to `http://localhost/ITLab/Form/find_student.php`.

## Technologies Used

- **Frontend**: HTML5, Vanilla CSS3
- **Backend**: PHP 8+
- **Database**: MySQL (via XAMPP)
