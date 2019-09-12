<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        #regForm {
            background-color: #f2f2f2;
            margin: 60px auto;
            padding: 30px;
            width: 70%;
            min-width: 300px;
        }
        form {
            border: 3px solid #f1f1f1;
        }

        input[type=text], input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        #b {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        #b:hover {
            opacity: 0.8;
        }
        .imgcontainer {
            text-align: center;
            margin: 24px 0 12px 0;
        }

        img.avatar {
            border-radius: 50%;
        }

        .container {
            padding: 16px;
        }

        span.psw {
            float: right;
            padding-top: 16px;
        }

        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {
            span.psw {
                display: block;
                float: none;
            }
        }
        h2 {
            text-align:center;
        }
    </style>
</head>
<body>
<div class="w3-top">
    <div class="w3-bar w3-white w3-wide w3-padding w3-card">
        <a href="HomePage.php" class="w3-bar-item w3-button"><b>DB</b>-MaaRS</a>
        <!-- Float links to the right. Hide them on small screens -->
        <div class="w3-right w3-hide-small">
            <a href="Form.php" class="w3-bar-item w3-button">Try Mutations</a>
        </div>
    </div>
</div>
<br>

<form id="regForm" method="post" action="admin.php">
    <h1 align="center">Login Form</h1>
    <div class="imgcontainer">
        <img src="avatar-05.png" alt="Avatar" class="avatar" width="270" height="270">
    </div>

    <div class="container">
        <label><b>Username</b></label>
        <input type="text" name="uname" placeholder="Enter Username" required>

        <label><b>Password</b></label>
        <input type="password"  placeholder="Enter Password" name="pswd" required>

        <input id="b" type="submit" name="submit" value="Login">

        <br />
        <br />


    </div>
</form>
</body>
</html>
<?php
session_start();
$servername = "localhost";
$username = "root";
$pswd="";
$dbname = "project";
require("D:\spdproject\phpstorm\database.php");

$data = new data();
$con = new mysqli($servername,$username,$pswd,$dbname);
if($con->connect_error)
{
    echo "<script>alert('Connection Error\\nPlease Refresh this Page Or Try Again Later');</script>";
}
else{

}
if(isset($_POST['submit']))
{
    $uname = $_POST['uname'];
    $pwd = $_POST['pswd'];

    if($data->validate($pwd,$uname,$con)){
        $_SESSION['logflag'] = 0;
        header('Location: admin2.php');
    }else{
        echo "<script>alert('Username or Password is incorrect\\nPlease Try Again');</script>";
    }
}
?>
