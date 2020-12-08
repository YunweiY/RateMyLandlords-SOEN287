<?php
session_start();
//Import the PHPMailer class into the global namespace
//You don't have to modify these lines.
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');
require 'vendor/autoload.php';
//Create a new PHPMailer instance
$mail = new PHPMailer();
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// SMTP::DEBUG_OFF = off (for production use)
// SMTP::DEBUG_CLIENT = client messages
// SMTP::DEBUG_SERVER = client and server messages
//$mail->SMTPDebug = SMTP::DEBUG_SERVER;
//Set the hostname of the mail server (We will be using GMAIL)
$mail->Host = 'smtp.gmail.com';
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 587;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication
$mail->Username = 'yunweiy0211@gmail.com';
//Password to use for SMTP authentication
$mail->Password = 'Yang0211@';
//Set who the message is to be sent from
$mail->setFrom('yunweiy0211@gmail.com', 'Rate My Landlords team');
//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');
//Set who the message is to be sent to email and name
$mail->addAddress("{$_POST["email_contact"]}", "{$_POST["FirstName"]}"." "."{$_POST["LastName"]}");
//Name is optional
//$mail->addAddress('recepientid@domain.com');

//You may add CC and BCC
//$mail->addCC("recepient2id@domain.com");
//$mail->addBCC("recepient3id@domain.com");

$mail->isHTML(true);

//You can add attachments. Provide file path and name of the attachments
//Filename is optional
//$mail->addAttachment("images/profile.png");

//Set the subject line
$mail->Subject = 'Rate my Landlord: Request sent';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->Body = "Dear ".$_POST["LastName"]." ".$_POST["FirstName"].",<br/><br/>".
"We have received your request and will get back to you as soon as possible.<br/><br/>".
"Best regards,<br/>".
"Rate My Landlords team<br/><br/>".
"Name: ".$_POST["LastName"].", ".$_POST["FirstName"]."<br/>".
"Email: ".$_POST["email_contact"]."<br/>".
"Phone number: ".$_POST["phone"]."<br/>".
"Message: ".$_POST["message"];
//You may add plain text version using AltBody
//$mail->AltBody = "This is the plain text version of the email content";
//send the message, check for errors
//if (!$mail->send()) {
//    echo 'Mailer Error: ' . $mail->ErrorInfo;
//} else {
//    echo 'Message was sent Successfully!';
//}
Session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Password sent</title>
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
<main id="frontPage">
    <br/>
    <br/>
    <div id="introduction">
        <p>
            <?php
            if (!$mail->send()) {
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                echo 'We have received your request!';
            }
            ?>
        </p>
        <button><a href="FrontPage.php">Return to Homepage <span>&#8594;</span></a></button><br/>
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
