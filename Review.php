<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Write a Review</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Merriweather" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- start的css -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/><!--map-->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""><!--map-->

        var mymap =null;
    </script>

    <style type="text/css">
        #map {
            height: 400px;
        }
        
    table{
        width:100%;
        table-layout: fixed;
    }
        
    .fa {
    font-size: 25px;
    }
    .bar-container {
        width: 100%;
        background-color: #f1f1f1;
        text-align: center;
        color: white;
    }
    .bar-5{
        background-color: gold;
        width: 50%;
        height: 13px;

    }
    .bar-4{
        background-color: gold;
        width: 10%;
        height: 13px;

    }
    .bar-3{
        background-color: gold;
        width: 20%;
        height: 13px;

    }
    .bar-2{
        background-color: gold;
        width: 40%;
        height: 13px;

    }
    .bar-1{
        background-color: gold;
        width: 70%;
        height: 13px;

    }


    .checked {
    color: red;
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
<main id="review">
   <table border = "1" >
       <tr>
           <td><span class="heading">Landlord <?php echo $_SESSION["landlord_name"];?></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span><!--要增加星数就check-->
                <span class="fa fa-star"></span>
                <p>4.1 average based on 254 reviews.</p>
            </td>

           <td>
               <div class="row">
                    <div class="side">
                        <div>5 star</div>
                    </div>
                <div class="middle">
                    <div class="bar-container">
                        <div class="bar-5"></div><!-- 第五个bar -->
                    </div>
                </div>
                <div class="side right">
                    <div><?php echo $_SESSION["star5"]; ?></div><!-- 5星人数 -->
                </div>
                <div class="side">
                    <div>4 star</div>
                </div>
                <div class="middle">
                    <div class="bar-container">
                        <div class="bar-4"></div>
                    </div>
                </div>
                <div class="side right">
                    <div><?php echo $_SESSION["star4"]; ?></div></div>
                </div>
                <div class="side">
                    <div>3 star</div>
                </div>
                <div class="middle">
                    <div class="bar-container">
                        <div class="bar-3"></div>
                    </div>
                </div>
                <div class="side right">
                    <div><?php echo $_SESSION["star3"]; ?></div></div>

                <div class="side">
                    <div>2 star</div>
                </div>
                <div class="middle">
                    <div class="bar-container">
                        <div class="bar-2"></div>
                    </div>
                </div>
                <div class="side right">
                    <div><?php echo $_SESSION["star2"]; ?></div></div>
                <div class="side">
                    <div>1 star</div>
                </div>
                <div class="middle">
                    <div class="bar-container">
                    <div class="bar-1"></div>
                    </div>
                </div>
                <div class="side right">
                    <div><?php echo $_SESSION["star1"]; ?></div></div>


           </td>
       </tr>
       <tr>
           <td colspan="2" ><!--map-->
               <div id="mapid" style="width: 1878px; height: 600px;"></div>
               <script type="text/javascript">

                   //Initialize Map
                   var ConcordiaLat = 45.495675;
                   var ConcordiaLong = -73.578667;

                   //mapid is the id for your div element
                   //You can leave the rest as it is
                   mymap = L.map('mapid').setView([ConcordiaLat, ConcordiaLong], 14.5);
                   L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                       maxZoom: 18,
                       attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                           '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                           'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                       id: 'mapbox/streets-v11',
                       tileSize: 512,
                       zoomOffset: -1
                   }).addTo(mymap);


                   //CODE TO CHANGE ADDRESS TO LATLONG
                   //https://www.w3schools.com/js/js_ajax_http_response.asp
                   //https://wiki.openstreetmap.org/wiki/FR:Nominatim
                   //There is also the reverse search from lat long to address
                   function addr_search()
                   {
                       var addr =  $_SESSION["address"] ;//address php
                       var xmlhttp = new XMLHttpRequest();
                       var url = "https://nominatim.openstreetmap.org/search?format=json&limit=3&q=" + addr;
                       xmlhttp.onreadystatechange = function()
                       {
                           if (this.readyState == 4 && this.status == 200)
                           {
                               var myArr = JSON.parse(this.responseText);
                               //myArr is an array of the matching addresses
                               //You can extract the lat long attributes


                               //Create markers from the info

                               var newlatlng = L.latLng(myArr[0].lat, myArr[0].lon);

                               L.circleMarker(newlatlng, { color: "green", radius: 10}).addTo(mymap);


                           }
                       };
                       xmlhttp.open("GET", url, true);
                       xmlhttp.send();
                   }



               </script>


           </td>
       </tr>

       <tr>
           <td colspan="2" >
           <div>
           <label>User name: <?php echo $_SESSION["username"]?></label>
           <label>Start </label>
           <span class="fa fa-star checked"></span>
           <span class="fa fa-star checked"></span>
           <span class="fa fa-star checked"></span>
           <span class="fa fa-star checked"></span><!--要增加星数就check-->
           <span class="fa fa-star"></span>
           <br/>
           <label>Score: </label>
           <?php echo $_SESSION["commment"]?>
           <br/>
           <label>comments: </label>
           <?php echo $_SESSION["commment"]?>
           <br/>
           </div>
           </td >
       </tr>




   </table>
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
