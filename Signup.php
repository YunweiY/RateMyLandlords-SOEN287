<?php
Session_start();
$_SESSION["gender"]="anonymous";
$_SESSION["identity"]="anonymous";
$available=$passwords=true;
if($_SERVER["REQUEST_METHOD"] == "POST"&&isset($_POST['check'])){
    $_SESSION["first_name"]=$_POST["first_name"];
    $_SESSION["last_name"]=$_POST["last_name"];
    $_SESSION["email"]=$_POST["email"];
    $_SESSION["phone"]=$_POST["phone"];
    $_SESSION["address"]=$_POST["address"];
    $_SESSION["age"]=$_POST["age"];
    $_SESSION["gender"]=$_POST["gender"];
    $_SESSION["identity"]=$_POST["identity"];
    if(id_availability()){
        $available=true;
        $available_message = "This id is available!";
    }
    else{
        $available=false;
        $available_message = "This id already exists. Please choose another one.";
        unset($_SESSION["username"]);
    }
}
if($_SERVER["REQUEST_METHOD"] == "POST"&&isset($_POST['submit'])){
    $_SESSION["first_name"]=$_POST["first_name"];
    $_SESSION["last_name"]=$_POST["last_name"];
    $_SESSION["email"]=$_POST["email"];
    $_SESSION["phone"]=$_POST["phone"];
    $_SESSION["address"]=$_POST["address"];
    $_SESSION["age"]=$_POST["age"];
    $_SESSION["gender"]=$_POST["gender"];
    $_SESSION["identity"]=$_POST["identity"];
    $available=id_availability();
    if(empty($_POST["password"])){
        $passwords = false;
        $password_message = "Please enter a password";
    }
    elseif(empty($_POST["check_password"])){
        $passwords = false;
        $password_message = "Please confirm your password";
    }
    elseif($_POST["check_password"]!=$_POST["password"]){
        $passwords = false;
        $password_message = "You have entered a different password";
    }
    else{
        $_SESSION["password"]=$_POST["password"];
        $passwords=true;
    }
    if($available&&$passwords){
        //store all information to /userdata/accounts.txt
        $file=fopen('userdata/accounts.txt','a') or die("Unable to open file!");
        $info=$_SESSION["username"]."\t".$_SESSION["password"]."\t".$_SESSION["first_name"]."\t" .$_SESSION["last_name"].
            "\t".$_SESSION["email"]."\t".$_SESSION["phone"]."\t".$_SESSION["address"].
            "\t".$_SESSION["age"]."\t".$_SESSION["gender"]."\t".$_SESSION["identity"]."\n";
        fwrite($file,$info);
        fclose($file);
        //clear the data display in form and go to page
        unset($_SESSION["first_name"]);
        unset($_SESSION["last_name"]);
        unset($_SESSION["email"]);
        unset($_SESSION["phone"]);
        unset($_SESSION["address"]);
        unset($_SESSION["age"]);
        unset($_SESSION["gender"]);
        unset($_SESSION["identity"]);
        unset($_SESSION["username"]);
        unset($_SESSION["password"]);
        header("location: Congratulations.php");
    }
}
function id_availability()
{
    $lines = fopen('userdata/accounts.txt','r');
    while (!feof($lines)){
        $line=fgets($lines);
        if(strpos($line, "{$_POST["username"]}") !== false){
            return false;
        }
    }
    fclose($lines);
    $_SESSION["username"]=$_POST["username"];
    return true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign up</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Merriweather" />
    <style>
        b{
            color:red;
            text-decoration: none;
        }
        form{
            margin:25pt;
        }
        fieldset{
            padding: 10pt 25pt;
        }
        legend{
            color:#3c4359;
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
        <form method="post">
            <fieldset>
                <legend>Step 1: Personal Information (Please complete all fields with "<b>*</b>")</legend>
                <label>First Name: <input type = "text" name="first_name" placeholder="First Name" required <?php if(isset($_SESSION["first_name"])) echo "value=\"{$_SESSION["first_name"]}\"";?>/></label><b>*</b><br/>
                <label>Last Name: <input type = "text" name="last_name" placeholder="Last Name" required <?php if(isset($_SESSION["last_name"])) echo "value=\"{$_SESSION["last_name"]}\"";?>/></label><b>*</b><br/><br/>
                <label>Email: <input type = "email" name="email" placeholder="123@123.com" required <?php if(isset($_SESSION["email"])) echo "value=\"{$_SESSION["email"]}\"";?>/></label><b>*</b><br/><br/>
                <label>Phone number: <input type = "text" name="phone" placeholder="123-456-7890" <?php if(isset($_SESSION["phone"])) echo "value=\"{$_SESSION["phone"]}\"";?>/></label><br/><br/>
                <label>Address: <input type = "text" name="address" placeholder="Your Address" <?php if(isset($_SESSION["address"])) echo "value=\"{$_SESSION["address"]}\"";?>/></label><br/><br/>
                <label>Age: <input type = "text" name="age" placeholder = "20" <?php if(isset($_SESSION["age"])) echo "value=\"{$_SESSION["age"]}\"";?>/> years old</label><br/><br/>
                <label>Gender: <b>*</b><br/>
                    <input type = "radio" name = "gender" value="male" <?php if($_SESSION["gender"]=="male") echo "checked";?>/>Male<br/>
                    <input type = "radio" name = "gender" value="female" <?php if($_SESSION["gender"]=="female") echo "checked";?>/>Female<br/>
                    <input type = "radio" name= "gender" value="anonymous" <?php if($_SESSION["gender"]=="anonymous") echo "checked";?>/>Anonymous</label><br/>
                <br/>
                <label>Sign up as: <b>*</b><br/>
                    <input type = "radio" name = "identity" value="landlord" <?php if($_SESSION["identity"]=="landlord") echo "checked";?>/>Landlord<br/>
                    <input type = "radio" name = "identity" value="tenant" <?php if($_SESSION["identity"]=="tenant") echo "checked";?>/>Tenant<br/>
                    <input type = "radio" name= "identity" value="anonymous" <?php if($_SESSION["identity"]=="anonymous") echo "checked";?>/>Anonymous</label><br/><br/>
            </fieldset>
            <fieldset>
                <legend>Step 2: Create an Account</legend>
                <label>Username: <input type = "text" name="username" required <?php if(isset($_SESSION["username"])) echo "value=\"{$_SESSION["username"]}\"";?>/> </label>
                <input type="submit" value="Check" name="check">
                <?php
                    if(isset($available_message)){
                        echo "<b>".$available_message."</b>";
                    }
                ?><br/><br/>
                <label>Password: <input type = "password" name="password"/></label><br/>
                <label>Confirm Password: <input type = "password" name="check_password"/></label><br/>
                <?php
                    if(isset($password_message)){
                        echo "<b>".$password_message."</b>";
                    }
                    else{
                        echo "<br/>";
                    }
                ?>
                <input type="submit" value="Submit" name="submit">
            </fieldset>
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
