<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'mysql@9';
$dbname = 'users'; 

$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hashing the password
    $email = $_POST['email'];

    $sql = "INSERT INTO register (name, password, email) VALUES (?, ?, ?)";
    $stmt = $mysqli->prepare($sql);

    if ($stmt === false) {
        die("Error: " . $mysqli->error);
    }

    $stmt->bind_param("sss", $name, $password, $email); // Three "s" for three string parameters

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
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
    <title>Register</title>
    <style>
        .container{
            padding: 20px;
            margin-left: 400px;
            margin-right: 400px;
            background-color:gainsboro;
        }
        input[type=text], input[type=password], input[type=email]{
            display: inline-block;
            border: 0px solid #ccc;
            box-sizing: border-box;
            margin:9px 0;
            padding: 10px 15px;
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
        .img{
            text-align: center;
        }
    </style>
</head>
<body>
    <form method="post">
        <div class="container">
            <div class="img">
                <img src="./images/img_avatar2.png" alt="Avatar" class="avatar" width="200px" height="200px" style="border-radius: 50%;">
            </div>
            <label for="username"><b>Username</b></label>
            <input type="text" id="username" name="username" placeholder="Enter Username" required>

            <label for="email"><b>Email</b></label>
            <input type="email" id="email" name="email" placeholder="Enter Email" required>

            <label for="password"><b>Password</b></label>
            <input type="password" id="password" name="password" placeholder="Enter Password" required>

            <button type="submit">Register</button>
        </div>
    </form>
</body>
</html>
