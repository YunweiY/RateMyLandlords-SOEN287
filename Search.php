<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>search</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Merriweather" />
</head>
<body>
    <nav>
        <a href="FrontPage.php" id="logo"><img src="pics/logo-sided-inverted.png" height="30"></a>
        <a href="FrontPage.php">Home</a>
        <a href="Review.php">Review</a>
        <a href="MyAccount.php">My account</a>
        <a href="Search.php" class="active">Search</a>
        <button><a href="Signup.php">Sign up</a></button>
        <button><a href="Login.php">Log in</a></button>
    </nav>
    <form action = "">

	 <fieldset>
		
        <legend id = "QS" >Quick Search</legend>
        
        <input id = "search-address" value = "landlord"/>
        
        <button type="button" onclick=addr_search()> check </button>
       
       <br/>
	
    </fieldset>

</form>
    <fieldset>

        <legend>Advance Search</legend>

        <label>Apartment Size</label>

        <br/>

        <select name = "size">

               <option value = "studio"> 1 1/2</option>
			   <option value = "apartment"> 2 1/2</option>
        	   <option value = "apartment"> 3 1/2</option>
        	   <option value = "apartment"> 4 1/2</option>
        	   <option value = "apartment"> 5 1/2</option>
        	   <option value = "apartment"> 6 1/2</option>
        </select>

                <br/>

        <br/>

        <label>Rental Term:

        <br/>

        <input type = "radio" name = "term" value = "st" checked/>short term</label><br/>

        <label><input type = "radio" name = "term" value = "lt">long term</label><br/>
        <label><input type = "radio" name = "term" value = "OT">other: </label><br/>
       	<input type = "text" name = "term" placeholder = "3 months">
        <br/>
        <br/>

        <label>Features:

        <br/>

        <input type = "checkbox" name = "f" value = "bl" checked/>balcony</label>

        <label><input type = "checkbox" name = "f" value = "hf">high floor</label>

        <label><input type = "checkbox" name = "f" value = "PL">elevator</label>
		
        <label><input type = "checkbox" name = "f" value = "SE">security</label>
        
        <label><input type = "checkbox" name = "f" value = "PS">parking spot</label>
        <br/>
		<br/>
    	
        <label>Inclued: </label>
    	<br/>
        <label><input type = "checkbox" name = "f" value = "EL">electronic</label>
    	<label><input type = "checkbox" name = "f" value = "WA" checked/>water</label>	
    	<br/><br/>
    	
        <label>Expected Rent: </label>
    	<br/>
        <input type = "text"  placeholder = "500$"></label>
    	<br/><br/>
    	
        <label>Gender

        <br/>

        <input type = "radio" name = "gender"checked/>male</label><br/>

        <label><input type = "radio" name = "gender">female</label><br/>
        <br/>
       
       <label>Age:

        <br/>

        <input type = "radio" name= "age" checked/>old</label><br/>

        <label><input type = "radio" name= "age" >young</label><br/>
        <label><input type = "radio" name= "age">other: </label><br/>
       	<input type = "text" placeholder = "20">years old
        <br/>
        <br/>
        
        <label>Personalities Of Landlord:

        <br/>

        <input type = "checkbox"  checked/>kind</label>

        <label><input type = "checkbox"  >strict</label>

        <label><input type = "checkbox" >easy-going</label>
		
        <label><input type = "checkbox"  >straightforward</label>
        
        <label><input type = "checkbox"  >gentle</label>
        <br/>
		<br/>
    
    	<label>The Nationality Of Landlord: </label>
    	<br/>
        <input type = "text"  placeholder = "Canada"></label>
    	<br/><br/>
        
        <label>Apartment Address: </label>
    	<br/>
        <input type = "text"  placeholder = "2540 rue onratio, Montreal, QC" id = "address"></label>
    	<br/><br/>
    
    	<input type="submit" value="Submit">
		<input type="reset" value="Start Over">
    </fieldset>
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

