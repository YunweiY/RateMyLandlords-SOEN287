<?php
Session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $lines = fopen('landlords/landlords.txt','r');
    while (!feof($lines)){
        $line=fgets($lines);
        if(strpos($line, "{$_POST["search"]}") !== false){
            $info=explode("\t",$line);
            $_SESSION["landlord_name"]=$info[0];
            $_SESSION["landlord_address"]=$info[1];
            fclose($lines);
            header("location: Review.php");
        }
    }
    fclose($lines);
    header("location: Review.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Merriweather" />
    <style>
        fieldset{
            display: block;
            margin: 1.0em auto;
            text-align: center;
        }

        table.serach-field{
            margin:0 auto;
        }

        input{
            font-size:25px;
            border-color:#3c4359;
            color:#3c4359;
            background-color: transparent;
        }
    </style>

</head>
<body>
<nav>
    <a href="FrontPage.php" id="logo"><img src="pics/logo-sided-inverted.png" height="30" alt="logo"></a>
    <a href="FrontPage.php">Home</a>
    <a href="Search.php" class="active">Search</a>
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
<main id = "frontPage">
    <br/>
    <br/>
    <br/>
    <br/>
    <div id="introduction" style="margin:0 auto;">
        <form method = "post" >
                <label>Search what you want!</label><br/>
                <table class = "serach-field" border = "0" >
                   <tr>
                    <td><input type="text" name="search" size="50"/></td>
                    <td>
                        <input type="image" src="pics/search_icon.png" alt="Submit" width="25">
                    </td>
                   </tr>
                </table>
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

