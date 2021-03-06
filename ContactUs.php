<?php
Session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Merriweather" />
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
<main id="contactus">
    <fieldset>
    <p id="centerForContactUs">Get in touch with us now</p>
    <p id="smallWordsForContactUs">Please fill the form below</p>
    </fieldset>
    <br/>
	<form method="post" action="ContactSent.php">
    <table>
    <tr>
        <td><label><input class="contactInfo"  type="text" name="LastName" placeholder="Last name"></label></td>
        <td><label><input class="contactInfo" name="FirstName" type="text" placeholder="First name"></label></td>
    </tr>
    <tr>
        <td><label><input class="contactInfo" name="email_contact" type="text" placeholder="Email address"></label></td>
        <td><label><input class="contactInfo" name="phone" type="text" placeholder="Phone number"></label></td>
    </tr>
</table><br/><br/>
    <label><textarea type="text" name="message" placeholder="Why are you trying to contact us?"></textarea></label><br/><br/>
    <p>Are you a robot?</p>
    <label><input id="robotChecking" type="text" placeholder="Say 'No'"></label><br/><br/>
    <button>Send to us!</button><br/><br/>
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