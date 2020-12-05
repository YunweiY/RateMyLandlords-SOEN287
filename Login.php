<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log in</title>
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
    <div id="loginBox">
    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username"><br/>
    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password"><br/>
    <label>
        <input type="checkbox" name="remember"> Remember me
    </label></br>
    <button type="submit">Login</button>
    <button type="button">Cancel</button><br/>
        <br/>
        <span id="password">
            <a href="#">Forgot password?</a><br/>
            <a href="Signup.php">Don't have an account? Sign up now!</a>
        </span>
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