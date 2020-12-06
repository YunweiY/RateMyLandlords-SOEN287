<?php
Session_start();
$exist=true;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $lines = fopen('userdata/accounts.txt','r');
    while (!feof($lines)){
        $line=fgets($lines);
        if(strpos($line, $_POST["email"]) !== false){
            $_SESSION["email"]=$_POST["email"];
            $info=explode("\t",$line);
            $_SESSION["password"]=$info[1];
            $_SESSION["first_name"]=$info[2];
            $_SESSION["last_name"]=$info[3];
            fclose($lines);
            header("location: PasswordSent.php");
        }
    }
    $exist=false;
    fclose($lines);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log in</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Merriweather" />
    <style>
        b{
            color:red;
            font-size:smaller;
        }
    </style>
</head>
<body>
<nav>
    <a href="FrontPage.php" id="logo"><img src="pics/logo-sided-inverted.png" height="30"></a>
    <a href="FrontPage.php">Home</a>
    <a href="Search.php">Search</a>
    <a href="MyAccount.php">My account</a>
    <?php
    if(isset($_SESSION["login"])&&$_SESSION["login"]){
        echo '<button><a href="SignOut.php">Sign out</a></button>';
        echo "<a href=\"MyAccount.php\" class='user'>{$_SESSION["name"]}, welcome!</a>";
    }
    else{
        echo '<button><a href="Signup.php">Sign up</a></button>';
        echo '<button><a href="Login.php">Log in</a></button>';
    }
    ?>
</nav>
<main>
    <form method="post" id="loginBox">
        <label>Your email &nbsp<input type="text" name="email" placeholder="123@123.com" required></label><br/>
        <?php
        if(!$exist){
            echo "<b>We don't have an account with that email.</b><br/><br/>";
        }
        else{
            echo"<br/>";
        }
        ?>
        <input type="submit" name="login" value="Submit"/>
    </form>
</main>
<footer>
    <table>
        <tr>
            <td>By Happy Web Programming team(No. 19)</td>
        </tr>
        <tr>
            <td><a href="ContactUs.php">Contact us</a></td>
        </tr>
    </table>
</footer>
</body>
</html>