<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign up</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Merriweather" />
</head>
<body>
    <nav>
        <a href="FrontPage.php" id="logo"><img src="pics/logo-sided-inverted.png" height="30"></a>
        <a href="FrontPage.php">Home</a>
        <a href="Review.php">Review</a>
        <a href="MyAccount.php">My account</a>
        <a href="Search.php">Search</a>
        <button><a href="Signup.php">Sign up</a></button>
        <button><a href="Login.php">Log in</a></button>
    </nav>
    <main>
        <br/>
    	<div class = "h1">Sign Up</div>
    	<br/>
		<label>First Name:<input type = "text"/></label><br/>
		<label>Last Name:<input type = "text"/></label><br/>
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
		<label>Sign Up With </label>
        <select name = "states">
			<option>Landlord</option>
    		<option>tenant</option>
			<option>anonymous</option>
    	</select>
        <br/>
    	<br/>
        <label>User Name: <input type = "text"/></label><br/>
		<label>Password: <input type = "text"/></label><br/>
    	<label>Confirm Password: <input type = "text"/></label><br/>
    	<br/>
        <button> confirm </button>
        <button> clear all </button>
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