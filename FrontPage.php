<?php
Session_start();
/*
$path = null;
$timestamp = null;
$counter_star5 =0;
    $counter_line5 =0;
    $counter_star4 =0;
    $counter_line4 =0;
    $counter_star3 =0;
    $counter_line3 =0;
    $counter_star2 =0;
    $counter_line2 =0;
    $counter_star1 =0;
    $counter_line1 =0;
    $allline=0;

$path = null;
$timestamp = null;

$dirname = dirname('/landlords/');
$dir = new DirectoryIterator($dirname);
foreach ($dir as $fileinfo) {
    if (!$fileinfo->isDot()) {
        if (filemtime($fileinfo->getFilename()) > $timestamp) {
            $path = $fileinfo->getFilename();
            $timestamp = filemtime($fileinfo->getFilename());
        }
    }
}

$lines = fopen($path,'r');
    while (!feof($lines)) {
        $lines = fgets($lines);
        if (strpos($lines, "5stars") !== false) {
            $counter_star5++;
        }
        $counter_line5++;
    }
$lines = fopen($path,'r');
	while (!feof($lines)) {
        if (strpos($line, "4stars") !== false) {
            $counter_star4++;
        }
        $counter_line4++;
    }
    fclose($lines);
$lines = fopen($path,'r');
    while (!feof($lines)) {
        $line = fgets($lines);
        if (strpos($line, "3stars") !== false) {
            $counter_star3++;
        }
        $counter_line3++;
    }
    fclose($lines);
$lines = fopen($path,'r');
    while (!feof($lines)) {
        $line = fgets($lines);
        if (strpos($line, "2stars") !== false) {
            $counter_star2++;
        }
        $counter_line2++;
    }
    fclose($lines);
$lines = fopen($path,'r');
    while (!feof($lines)) {
        $line = fgets($lines);
        if (strpos($line, "1star") !== false) {
            $counter_star1++;
        }
        $counter_line1++;
    }
	*/
	
	
	
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Merriweather" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- start的css -->

</head>
<body>
<nav>
    <a href="FrontPage.php" id="logo"><img src="pics/logo-sided-inverted.png" height="30"></a>
    <a href="FrontPage.php" class="active">Home</a>
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
         <p>Welcome to Rate My LandLords!</p>
        <button><a href="Search.php">Search a landlord <span>&#8594;</span></a></button><br/>
    </div>
	<!--	
	<div id="topReview">
		<p>Recent reviews</p>
		<span class="fa fa-star checked"></span >
		
	</div>
	-->
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