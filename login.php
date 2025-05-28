<?php
session_start();
if (isset($_POST['username']) && isset($_POST['password'])) {
    // User is already logged in, redirect to welcome page  
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username == "usm" && $password == "123") {
        // Set session variable
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
    }
}
?>
<html>
    <head>
        <title>::Login Page::</title>
        <style type="text/css">
            body{
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                background-size: cover;
                background-image: url("https://cdn.arstechnica.net/wp-content/uploads/2023/06/bliss-update-1440x960.jpg");
            }
            table{
                background-color: white;
                border: 3px solid grey;
                padding: 20px;
                border-radius: 10px;
                font-family:Arial, Helvetica, sans-serif;
            }
            td{
                padding: 5px;
            }
            button{
                background-color: greenyellow;
                padding: 10px;
                border-radius: 5px;
            }
        </style>
    </head>
    <body>
        <form action="login.php" method="post">
         <table>
            <tr>
                <td colspan="2" style="text-align: center;" >LOGIN</td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" /></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" /></td>
            </tr>
            <tr>
                <td colspan="2"><input type="checkbox" /> Ingatkan saya</td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;"><button type="submit" >SUBMIT</button></td>
            </tr>
        </table>
        </form>
    </body>
</html>