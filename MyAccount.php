<?php
Session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>My Account</title>
    <link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Merriweather" />
    <style>
        #introduction {
            font-size: 20pt;
        }
        table.info{
            margin-left:auto;
            margin-right:auto;
            text-align: left;
        }
    </style>
</head>
<body>
<nav>
    <a href="FrontPage.php" id="logo"><img src="pics/logo-sided-inverted.png" height="30"></a>
    <a href="FrontPage.php">Home</a>
    <a href="Search.php">Search</a>
    <a href="MyAccount.php" class="active">My account</a>
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
<?php if(isset($_SESSION["login"])&&$_SESSION["login"]){?>
    <main id="frontPage">
        <br/>
        <br/>
        <div id="introduction">
            <p>Personal Profile</p>
            <table class="info">
                <tr>
                    <td>First Name &nbsp</td>
                    <td><?php echo $_SESSION["first_name"];?></td>
                </tr>
                <tr>
                    <td>Last Name &nbsp</td>
                    <td><?php echo $_SESSION["last_name"];?></td>
                </tr>
                <tr>
                    <td>Email address &nbsp</td>
                    <td><?php echo $_SESSION["email"];?></td>
                </tr>
                <tr>
                    <td>Phone number &nbsp</td>
                    <td><?php echo $_SESSION["phone"];?></td>
                </tr>
                <tr>
                    <td>Address &nbsp</td>
                    <td><?php echo $_SESSION["address"];?></td>
                </tr>
                <tr>
                    <td>Age &nbsp</td>
                    <td><?php echo $_SESSION["age"];?></td>
                </tr>
                <tr>
                    <td>Gender &nbsp</td>
                    <td><?php echo $_SESSION["gender"];?></td>
                </tr>
                <tr>
                    <td>Identity &nbsp</td>
                    <td><?php echo $_SESSION["identity"];?></td>
                </tr>
            </table>
        </div>
    </main>
<?php } else{ ?>
    <main id="frontPage">
        <br/>
        <br/>
        <div id="introduction">
            <p>You have not logged in!</p>
            <button><a href="Login.php">Log in <span>&#8594;</span></a></button><br/>
            <button><a href="FrontPage.php">Back to Homepage <span>&#8594;</span></a></button><br/>
        </div>
    </main>
<?php } ?>
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
