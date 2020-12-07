<?php
session_start();
?>
<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="UTF-8">
    <title>Front Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Merriweather" />
    <style>
        input{
            line-height: 2em;
        }
        input[type="submit"] {
            background-color: cadetblue;
            color: aliceblue;
            width: 200px; /* width of image */
            height: 50px; /* height of image */
            border: 0;
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
<main id="frontPage">
    <br/>
    <br/>
    <br/>
    <br/>
    <div id="introduction">


        <form action="" method = "post">

            <label>What is the name of the landlord?</label><br/>
            <input type = "text" name = "add_landlord_name" size="50" /><br/>
            <label>What is the address of the landlord?</label>
            <br/>
            <input type = "text" name = "add_landlord_address" size="50" /><br/>
            <input type = "submit" value = "submit"/>
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
