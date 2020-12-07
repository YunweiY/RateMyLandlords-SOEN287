<?php
session_start();
if(isset($_SESSION["landlord_name"])){
    //read landlord_name.txt
    //count the ratings
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
    $lines = fopen("landlords/{$_SESSION["landlord_name"]}.txt",'r');
    while (!feof($lines)) {
        $line = fgets($lines);
        if (strpos($line, "5stars") !== false) {
            $counter_star5++;
        }
        $counter_line5++;
    }
    $lines = fopen("landlords/{$_SESSION["landlord_name"]}.txt",'r');
    while (!feof($lines)) {
        $line = fgets($lines);
        if (strpos($line, "4stars") !== false) {
            $counter_star4++;
        }
        $counter_line4++;
    }
    $lines = fopen("landlords/{$_SESSION["landlord_name"]}.txt",'r');
    while (!feof($lines)) {
        $line = fgets($lines);
        if (strpos($line, "3stars") !== false) {
            $counter_star3++;
        }
        $counter_line3++;
    }
    $lines = fopen("landlords/{$_SESSION["landlord_name"]}.txt",'r');
    while (!feof($lines)) {
        $line = fgets($lines);
        if (strpos($line, "2stars") !== false) {
            $counter_star2++;
        }
        $counter_line2++;
    }
    $lines = fopen("landlords/{$_SESSION["landlord_name"]}.txt",'r');
    while (!feof($lines)) {
        $line = fgets($lines);
        if (strpos($line, "1stars") !== false) {
            $counter_star1++;
        }
        $counter_line1++;
    }
    $allline = $counter_line1-1;
    $average = (5*$counter_star5+4*$counter_star4+3*$counter_star3+2*$counter_star2+$counter_star1)/($counter_star5+$counter_star4+$counter_star3+$counter_star2+$counter_star1);
    fclose($lines);
//read all comments of the landlord in to a dynamic array and display later on the page
    $comments=array();
    $lines=fopen("landlords/{$_SESSION['landlord_name']}.txt",'r') or die("Unable to open file!");
    while (!feof($lines)){
        $line=fgets($lines);
        $info=explode("\t",$line);
        array_push($comments, $info);
    }
    array_pop($comments);
    fclose($lines);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>
        <?php
        if(isset($_SESSION["landlord_name"])){
            echo $_SESSION["landlord_name"];
        }
        else{
            echo "Landlord not found";
        }
        ?>
    </title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Merriweather" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- start的css -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/><!--map-->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""><!--map-->
    var mymap =null;
    </script>
    <style>
        #mapid {
            height: 300px;
            width:100%;
        }
        table.container{
            width:100%;
            table-layout: fixed;
            color: #3c4359;
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
            width:<?php if($counter_star5==0) echo "0%"; else echo (($counter_star5/$allline)*100)."%";?>;
            height: 13px;

        }
        .bar-4{
            background-color: gold;
            width: <?php if($counter_star4==0) echo "0%"; else echo (($counter_star4/$allline)*100)."%";?>;
            height: 13px;

        }
        .bar-3{
            background-color: gold;
            width: <?php if($counter_star3==0) echo "0%"; else echo (($counter_star3/$allline)*100)."%";?>;
            height: 13px;

        }
        .bar-2{
            background-color: gold;
            width: <?php if($counter_star2==0) echo "0%"; else echo (($counter_star2/$allline)*100)."%";?>;
            height: 13px;

        }
        .bar-1{
            background-color: gold;
            width: <?php  if($counter_star2==0) echo "0%"; else echo (($counter_star1/$allline)*100)."%";?>;
            height: 13px;

        }
        .checked {
            color: red;
        }
        button{
            border-radius: 90px;
            size: 50px;
            background-color: lavender;
        }
        button a{
            color:#3c4359;
            text-decoration:none;
        }
        .info{
            font-size: 30pt;
        }
        div.comment{
            color:#3c4359;
            padding:25pt;
            margin: 10pt;
            text-align: left;
            border-radius: 25px;
            background-color: lavender;
        }
    </style>
</head>
<body onload="addr_search()">
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
<?php if(isset($_SESSION["landlord_name"])){?>
<main id="review">
   <table border = "0" class="container" >
       <tr>
           <td>
               <span class="info"><?php echo $_SESSION["landlord_name"];?></span><br/>
               <span class="info"><?php echo $_SESSION["landlord_address"];?></span><br/><br/>

               <span class="fa fa-star checked"></span >
               <span class="fa fa-star <?php if($average>2||$average==2) echo "checked"; ?>"></span >
               <span class="fa fa-star <?php if($average>3||$average==3) echo "checked"; ?>"></span >
               <span class="fa fa-star <?php if($average>4||$average==4) echo "checked"; ?>"></span >
               <span class="fa fa-star <?php if($average==5) echo "checked"; ?>" ></span ><br/>

               <?php echo "<span> $average based on $allline reviews. </span>"?><br/><br/>
               <button><a href="Write%20review.php">Write a review <span>&#8594;</span></button>
           </td>
           <td>
               <table style="margin:10pt;">
                   <tr>
                       <th width="10%"></th>
                       <th width="200%"></th>
                       <th width="10%"></th>
                   </tr>
                   <tr>
                       <td><div>5 stars</div></td>
                       <td>
                           <div class="bar-container">
                               <div class="bar-5"></div>
                           </div>
                       </td>
                       <td><div><?php echo $counter_star5; ?></div></td>
                   </tr>
                   <tr>
                       <td><div>4 stars</div></td>
                       <td>
                           <div class="bar-container">
                               <div class="bar-4"></div>
                           </div>
                       </td>
                       <td><div><?php echo $counter_star4; ?></div></td>
                   </tr>
                   <tr>
                       <td><div>3 stars</div></td>
                       <td>
                           <div class="bar-container">
                               <div class="bar-3"></div>
                           </div>
                       </td>
                       <td><div><?php echo $counter_star3; ?></div></td>
                   </tr>
                   <tr>
                       <td><div>2 stars</div></td>
                       <td>
                           <div class="bar-container">
                               <div class="bar-2"></div>
                           </div>
                       </td>
                       <td><div><?php echo $counter_star2; ?></div></td>
                   </tr>
                   <tr>
                       <td><div>1 star</div></td>
                       <td>
                           <div class="bar-container">
                               <div class="bar-1"></div>
                           </div>
                       </td>
                       <td><div><?php echo $counter_star1; ?></div></td>
                   </tr>
               </table>
           </td>
       </tr>
       <tr>
           <td colspan="2" ><!--map-->
               <div id="mapid"></div>
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
                       var address =<?php echo json_encode($_SESSION['landlord_address']); ?>;//address php
                       address=address.slice(0, -1);
                       var name =<?php echo json_encode($_SESSION['landlord_name']); ?>;//address php
                       var xmlhttp = new XMLHttpRequest();
                       var url = "https://nominatim.openstreetmap.org/search?format=json&limit=3&q=" + address;
                       xmlhttp.onreadystatechange = function()
                       {
                           if (this.readyState == 4 && this.status == 200)
                           {
                               var myArr = JSON.parse(this.responseText);
                               //myArr is an array of the matching addresses
                               //You can extract the lat long attributes
                               //Create markers from the info
                               var newlatlng = L.latLng(myArr[0].lat, myArr[0].lon);
                               L.marker(newlatlng, { color: "green", radius: 10}).addTo(mymap).bindPopup(name).openPopup();
                               mymap = L.map('mapid').setView([myArr[0].lat, myArr[0].lon], 14.5);
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
               <?php foreach($comments as $info){ ?>
                   <div class="comment">
                       <span><?php echo $info[2]?> &nbsp</span>
                       <span class="fa fa-star checked"></span>
                       <span class="fa fa-star <?php if ($info[0]!=="1star") echo 'checked';?>"></span>
                       <span class="fa fa-star <?php if ($info[0]!=="1star"&&$info[0]!=="2stars") echo 'checked';?>"></span>
                       <span class="fa fa-star <?php if ($info[0]!=="1star"&&$info[0]!=="2stars"&&$info[0]!=="3stars") echo 'checked';?>"></span><!--要增加星数就check-->
                       <span class="fa fa-star <?php if ($info[0]==="5stars") echo 'checked';?>"></span>
                       <p><?php echo $info[1]?></p>
                   </div>
               <?php } ?>
           </td >
       </tr>
    </table>
</main>
<?php } else { ?>
    <main id="frontPage">
        <br/>
        <br/>
        <div id="introduction">
            <p>Landlord not found!</p>
            <button><a href="NewLandlord.php">Create one <span>&#8594;</span></a></button><br/>
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
