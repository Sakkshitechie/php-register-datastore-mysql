<?php
session_start();

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'mysql@9';
$dbname = 'users'; 

$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($mysqli->connect_error) {
    die("Connection failed: ".$mysqli->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM register WHERE name = ?";
    $stmt = $mysqli->prepare($sql);

    if ($stmt===false) {
        die("Error: ".$mysqli->error);
    }

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows==1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            echo "Login successful. Welcome, $username!";
            // Redirect to a logged-in page
            header("Location: index.php");
            exit();
        } else {
            echo "Incorrect password. Please try again.";
        }
    } else {
        echo "Username not found. Please register first.";
    }
    $stmt->close();
}
$mysqli->close();
?>