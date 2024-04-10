<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home page</title>
    <style>
        body{
            margin: 0px;
        }
        nav{
            text-align: right;
        }
        nav ul{
            margin: 0px;
            padding: 0px;
            list-style: none;
            overflow: hidden;
        }
        nav ul li{
            display: inline-block;
        }
        nav ul li a{
            text-decoration: none;
            padding: 20px;
            font-weight: bolder;
            display: block;
            color: black;
            text-transform: uppercase;
        }
        li a{
            display: block;
            color: white;
            padding: 2% 5%;
        }
        li a:hover{
            background-color: white;
        }
        .list{
            padding-right: 25px;
            display: inline-block;
        }
        .container{
            width: 100%;
            padding-bottom: 5px;
            background-color:lightcoral;
        }
        .main-content{
            background-color:thistle;
            background-image: url("./images/background_img.jpeg");
            width: 100%;
            height:600px;
            margin: 0px;
        }
        h1{
            color:ivory;
            text-align: center;
            margin: 0px; 
            padding-top:50px;
            font-style: normal;
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-weight: bolder;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="container">
            <nav>
                <ul>
                    <li><a href="#"></a></li>
                    <li><a href="login.html">Login</a></li>
                    <li><a href="register.html">Register</a></li>
                </ul>
            </nav>
        </div>
        <div class="main-content">
            <h1>Welcome to the Website</h1>
        </div>
    </div>
</body>
</html>