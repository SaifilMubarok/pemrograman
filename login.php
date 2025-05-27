<?php
session_start();
if(isset($_POST["username"]) && isset($_POST["Password"])){
    $username = $_POST["username"];
    $Password = $_POST["Password"];

    if($username == "usm" && $Password == "123"){
        $_SESSION["username"] = "usm";
        header("Location:dasboard.php");
    }
}



?>


<html>
    <head>
        <title>login page</title>
        <style type="text/css">
            body{
                font-family: Arial, sans-serif;
      background-image: url('https://tse2.mm.bing.net/th?id=OIP.LmihmVjmDEpr1SVThLqixQHaEK&pid=Api&P=0&h=180');
      background-size: cover;
      background-position: center;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
            }
            table{
                background-color: white;
                border: 3px solid gray;
                padding: 20px;
                border-radius: 10px;
                font-family: Arial, Helvetica, sans-serif;
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
        <form method="post" action="login.php">
        <table>
            <tr>
                <td colspan="2" style="text-align: center;">LOGIN</td>
            </tr>
            <tr>
                <td>username</td>
                <td><input type="text" name="username" /></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="text" name="Password"/><td>
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