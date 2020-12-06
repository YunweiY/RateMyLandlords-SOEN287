<?php
session_start();
?>
<!DOCTYPE html>
<html lang = "en">
<head>
    <title>write review</title>
    <meta charset =  “utf-8” />
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>

        div.stars {
            width: 270px;
            display: inline-block;
            text-align: center;
        }

        input.star { display: none; }

        label.star {
            float: right;
            padding: 10px;
            font-size: 36px;
            color: #444;
            transition: all .2s;
        }

        input.star:checked ~ label.star:before {
            content: '\2605';
            color: #FD4;
            transition: all .25s;
        }

        input.star-5:checked ~ label.star:before {
            color: #FE7;
            text-shadow: 0 0 20px #952;
        }

        input.star-1:checked ~ label.star:before { color: #F62; }

        label.star:hover { transform: rotate(-15deg) scale(1.3); }

        label.star:before {
            content: '\2605';
    </style>
</head>
<body>
<nav>
    <a href="FrontPage.php" id="logo"><img src="pics/logo-sided-inverted.png" height="30" alt=" loggo"></a>
    <a href="FrontPage.php">Home</a>
    <a href="Review.php" class="active">Review</a>
    <a href="MyAccount.php">My account</a>
    <a href="Search.php">Search</a>
    <button><a href="Signup.php">Sign up</a></button>
    <button><a href="Login.php">Log in</a></button>
</nav>
<main id="write_review">
    <div class="stars">
        <form action="">
            <input class="star star-5" id="star-5" type="radio" name="star"/>
            <label class="star star-5" for="star-5"></label>
            <input class="star star-4" id="star-4" type="radio" name="star"/>
            <label class="star star-4" for="star-4"></label>
            <input class="star star-3" id="star-3" type="radio" name="star"/>
            <label class="star star-3" for="star-3"></label>
            <input class="star star-2" id="star-2" type="radio" name="star"/>
            <label class="star star-2" for="star-2"></label>
            <input class="star star-1" id="star-1" type="radio" name="star"/>
            <label class="star star-1" for="star-1"></label>
            <br/>
            <label>How many starts are you rating for</label>
            <br/><br/>
            <label>What is your comment?</label>
            <input type = "text"/>
            <br/> <br/>
            <label>Thanks for your appreciation!</label>
            <br/> <br/>
            <input type = "submit" value = "submit"/>
            <input type = "reset" value = "start over"/>
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
