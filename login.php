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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login page</title>
    <style>
        .container{
            padding: 16px;
            margin-left: 400px;
            margin-right: 400px;
            background-color:gainsboro;
        }
        input[type=text], input[type=password]{
            display:inline-block;
            border: 0px solid #ccc;
            box-sizing: border-box;
            margin:10px 0;
            padding: 10px 12px;
            width: 100%;
        }
        .container button{
            background-color: #04AA6D;
            border: none;
            cursor: pointer;
            color:white;
            margin: 8px 0;
            padding: 14px 20px;
            width: 100%;
        }
        button:hover{
            opacity: 0.8;
        }
        .container .cancelBtn{
            background-color: #f44336;
            width: 30%;
            padding:10px 18px;
            margin: 8px;
        }
        .img{
            text-align: center;
        }
        .password{
            float: right;
            padding-top: 20px;
        }
    </style>
</head>
<body>
    <form method="post">
        <div class="container">
            <div class="img">
                <img src="./images/img_avatar2.png" alt="Avatar" class="avatar" width="200px" height="200px" style="border-radius: 50%;">
            </div>
            <label for="Username"><b>Username</b></label>
            <input type="text" id="Username" name="Username" placeholder="Enter Username" required>
          
            <label for="password"><b>Password</b></label>
            <input type="password" id="password" name="password" placeholder="Enter Password" required>
        
            <button type="submit">Login</button>
       
            <label>
                <input type="checkbox" checked="checked" name="remember"> Remember Me
            </label> 
            <br><br>
            <button type="cancelbutton" class="cancelBtn" id="index.html"> Cancel </button>
            <span class="password"> Forgot <a href="#"> Password? </a></span>
        </div>
    </form>
</body>
</html>