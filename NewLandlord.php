<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //write landlord information to landlords/landlords.txt
    $_SESSION["landlord_name"]=$_POST["landlord_name"];
    $_SESSION["landlord_address"]=$_POST["landlord_address"];
    $file=fopen('landlords/landlords.txt','a') or die("Unable to open file!");
    $info=$_SESSION["landlord_name"]."\t".$_SESSION["landlord_address"]."\n";
    fwrite($file,$info);
    fclose($file);
    //create a file for the landlord in landlords folder
    $file=fopen("landlords/{$_SESSION['landlord_name']}.txt",'a') or die("Unable to open file!");
    fclose($file);
    header("Location: ThankYou.php");
}
?>
<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="UTF-8">
    <title>New Landlord</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Merriweather" />
    <style>
        label{
            font-size:25pt;
        }
        input{
            font-size:25px;
            border-color:#3c4359;
            color:#3c4359;
            background-color: transparent;
        }
        input[type="submit"] {
            background-color: cadetblue;
            color: aliceblue;
            width: 200px; /* width of image */
            height: 50px; /* height of image */
            border: 0;
        }
        span{
            color: red;
            font-size: medium;
        }
    </style>
    <script>
        function check(){
            var address = document.getElementById("password");
            if(address.value.search(/[0=9]{1}\ /) ===-1||address.value.search(/[0=9]{2}\ /) ===-1||
                address.value.search(/[0=9]{3}\ /) ===-1||address.value.search(/[0=9]{4}\ /) ===-1){
            }
            else{
                alert("Please enter a valid address!")
            }
        }
    </script>
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
<main id="frontPage">
    <br/>
    <br/>
    <br/>
    <div id="introduction">
        <form method = "post">
            <label>What is the name of the landlord?</label>
            <input type = "text" name = "landlord_name" size="50" placeholder="Name" required/><br/>
            <label>What is the address of the landlord?</label>
            <input type = "text" name = "landlord_address" size="50" placeholder="Example: 1455 De Maisonneuve Blvd. W." id="address" required/><br/>
            <input type = "submit" value = "Confirm" onclick="check()"/>
        </form>
    </div>
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
