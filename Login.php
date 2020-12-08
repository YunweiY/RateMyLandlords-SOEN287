<?php
Session_start();
$valid=true;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $lines = fopen('users/accounts.txt','r');
    while (!feof($lines)){
        $line=fgets($lines);
        if(strpos($line, $_POST["username"]) !== false && strpos($line, $_POST["password"]) !== false){
            $_SESSION["login"]=true;
            $_SESSION["name"]=$_POST["username"];
            $info=explode("\t",$line);
            $_SESSION["password"]=$info[1];
            $_SESSION["first_name"]=$info[2];
            $_SESSION["last_name"]=$info[3];
            $_SESSION["email"]=$info[4];
            $_SESSION["phone"]=$info[5];
            $_SESSION["address"]=$info[6];
            $_SESSION["age"]=$info[7];
            $_SESSION["gender"]=$info[8];
            $_SESSION["identity"]=$info[9];
            fclose($lines);
            //create cookie
            if($_POST["remember"]="remember"){
                setcookie("name", $_POST["username"], time()+3600*24*365,"/");
                setcookie("login", true, time()+3600*24*365,"/");
            }
            header("location: MyAccount.php");
        }
    }
    $valid=false;
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
        .middle {
            margin-left: auto;
            margin-right: auto;
        }
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
        <table class="middle">
            <tr>
                <td><span>Username &nbsp</span></td>
                <td><input type="text" name="username" placeholder="Enter Username" required></td>
            </tr>
            <tr>
                <td><span>Password &nbsp</span></td>
                <td><input type="password" name="password" placeholder="Enter Password" required></td>
            </tr>
        </table>
        <?php
        if(!$valid){
            echo "<b>Your username/password is incorrect.</b><br/><br/>";
        }
        else{
            echo"<br/>";
        }
        ?>
        <label><input type="checkbox" name="remember" value="remember"> Remember me</label><br/><br/>
        <input type="submit" name="login" value="Login"/>
        <br/><br/>
        <span id="password">
            <a href="ForgetPassword.php">Forgot password?</a><br/><br/>
            <a href="Signup.php">Don't have an account? Sign up now!</a>
        </span>
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