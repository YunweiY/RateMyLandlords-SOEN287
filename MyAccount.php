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
<main>
    <br/>
    <div class = "h1">
        Personal Profile
    </div>
    <br/>
    <label>States: </label>
    <select name = "states">
        <option>Landlord</option>
        <option>tenant</option>
        <option>anonymous</option>
    </select>
    <br/>
    <label>First Name:<input type = "text"/></label><br/>
    <label>Last Name:<input type = "text"/></label><br/>
    <label>email address:<input type = "text"/></label><br/>
    <label>Gender: <br/>
        <input type = "radio" name = "gender"checked/>male</label><br/>
    <label><input type = "radio" name = "gender">female</label><br/>
    <label><input type = "radio" name= "age">anonymous</label><br/>
    <br/>
    <label>Age:<br/><input type = "radio" name= "age" checked/>old</label><br/>
    <label><input type = "radio" name= "age" >young</label><br/>
    <label><input type = "radio" name= "age">anonymous</label><br/>
    <label><input type = "radio" name= "age">other: </label><br/>
    <input type = "text" placeholder = "20">years old
    <br/>
    <br/>
    <button id = "pss">sumbit</button>
    <br/>
    <br/>
    <div class = "h1">
        Change Password
    </div>
    <br/>
    <label>current password:<input type = "text"/></label><br/>
    <label>new password:<input type = "text"/></label><br/>
    <label>confirm password:<input type = "text"/></label><br/>
    <button id = "cpss">sumbit</button>
    <br/>
    <br/>
    <div class = "h1">
        Email Options
    </div>
    <label>Always contact me <input type = "radio" name = "contact"></label><br/>
    <label>do not contact me <input type = "radio" name = "contact"></label><br/>
    <label>only send me the meesages<input type = "radio" name = "contact"></label><br/>
    <button id = "eoss">sumbit</button>
    <br/>
    <br/>
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
