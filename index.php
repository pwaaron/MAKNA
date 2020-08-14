<!DOCTYPE html>
<html lang="en">
<LINK rel="stylesheet" type="text/css" href="stylesheet.css">
	<?php 
		echo "";echo "";echo "";echo "";echo "";echo "";echo "";echo "";echo "";echo "";
		include "db_init.php";


		echo "Success";
	?>
		<?php
				if(isset($_POST['submit'])){//to run PHP script on submit
					
					if(!empty($_POST['selected_items'])){
					// Loop to store and display values of individual checked checkbox.
						foreach($_POST['selected_items'] as $selected){
							$myquery = "SELECT * FROM item WHERE (item.product_id IS NOT NULL AND `order_id` = '$selected')";
            				$results = mysqli_query($conn, $myquery);
            				
							if(mysqli_num_rows($results) > 0){
								$stage = 2;
							} 
							else{
								$stage = 3;
							}
							
							$myquery = "UPDATE `item` SET `stage` = $stage WHERE `order_id` = '$selected'";
            				$results = mysqli_query($conn, $myquery);
            				
            				$myquery = "INSERT INTO `activity_hist`(`id`, `order_id`, `stage`, `timestamp`) VALUES (4, '$selected', '$stage', CURRENT_TIMESTAMP)";
            				$results = mysqli_query($conn, $myquery);
						}
					}
				}
				unset($selected_items);
				unset($selected);
				unset($submit);
				unset($myquery);
				unset($results);
		?>
	<head>
		<TITLE>Home</TITLE>
	</head>

	<body>
		<style type="text/css">
		.tg  {border-collapse:collapse;border-spacing:0;}
		.tg td{}
		.tg .tg-hfk9{background-color:#000000;border-color:#000000;text-align:center;vertical-align:top; font-family:Arial, sans-serif;font-size:10px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal}
		.tg .tg-llyw{background-color:#808080;border-color:#808080;text-align:left;vertical-align:top; font-family:Tahoma, sans-serif;font-size:20px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal}
		.tg .tg-0lax{text-align:left;vertical-align:top; border-color:#808080; font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal}
		.tg .tg-0pky{border-color:inherit;text-align:left;vertical-align:top; border-color:#ffffff; font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal}
		.tg .tg-1pky{border-color:inherit;text-align:center;vertical-align:top; border-color:#000000; font-family:Arial, sans-serif;font-size:20px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal}
		.blank_row
			{
			    height: 50px !important; /* overwrites any other rules */
			    background-color: #FFFFFF;
			}
		</style>
		<div class="tg-wrap"><table class="tg" style="position: absolute; top: 0; bottom: 0; left: 0; right: 0;undefined;table-layout: fixed; width: 100%">
		<colgroup>
		<col style="width: 5%">
		<col style="width: 10%">
		<col style="width: 15%">
		<col style="width: 15%">
		<col style="width: 15%">
		<col style="width: 15%">
		<col style="width: 20%">
		<col style="width: 5%">
		</colgroup>
		  <tr>
		    <td class="tg-hfk9" colspan="8" height = 20px></td>
		  </tr>
		  <tr>
		    <td class="tg-0lax" colspan="8"><img src="Logo.png" alt="Logo" width = 30%></td>
		  </tr>
		  <tr>
		    <td class="tg-llyw"></td>
		    <td class="tg-llyw" style="color: #dcdcdc"><a href="index.php"><b>HOME</b></a></td>
		    <td class="tg-llyw" style="color: #dcdcdc"><a href="Placed.php">ORDER PLACED</a></td>
		    <td class="tg-llyw" style="color: #dcdcdc"><a href="Gift.php">GIFT PACKAGING</a></td>
		    <td class="tg-llyw" style="color: #dcdcdc"><a href="Leaving.php">ORDER LEAVING</a></td>
		    <td class="tg-llyw" style="color: #dcdcdc"><a href="Sent.php">ORDER SENT</a></td>
		    <td class="tg-llyw" style="color: #dcdcdc"><a href="Singpost.php">SINGPOST</a></td>
		    <td class="tg-llyw"></td>
		  </tr>
		  <tr>
		    <td class="tg-0pky"></td>
		    <td class="tg-0pky" colspan="8">
		    	<br>
		    	<h1 style="font-family: Helvetica">Welcome to KrisShop Postcard Tracking Portal!</h1><br>
		    	For demonstration purposes, the postcards to be tracked will be simulated by manual input.<br> 
		    	To generate data, please fill in the following forms multiple times. <br><br>

		    	<form method="post">
		    		<table style="width:35%">
		    			<tr><td>Products Code (can be left blank, ranges 1-10</td><td><input type="number" name="product_id"><br></td></tr>
						<tr><td>Origin of Postbox</td><td> <input type="text" name="postbox"><br></td></tr>
		    		</table>
				<input type="submit" name="submit" value="GENERATE NEW POSTCARD!">
            	</form>

		    	<?php
            	if(isset($_POST['submit'])){//to run PHP script on submit
					
					$productid = $_POST['product_id'];
					//echo $productid;
					$postbox = $_POST['postbox'];
					//echo $postbox;
					$myquery = "INSERT INTO `item`(`product_id`, `timestamp`, `postbox`, `stage`) VALUES ('$productid', CURRENT_TIMESTAMP, '$postbox', 1)";
					$results = mysqli_query($conn, $myquery);
            		if ($results){

						$myquery = "SELECT * FROM `item` ORDER BY `timestamp` DESC";
	            		$results = mysqli_query($conn, $myquery);
	            		
	            		$dateposting = mysqli_fetch_row($results)[3];

	            		$myquery = "SELECT * FROM `item` ORDER BY `timestamp` DESC";
	            		$results = mysqli_query($conn, $myquery);
	            		$orderid = mysqli_num_rows($results) + 10000;
	            		$dbid = mysqli_fetch_row($results)[0];

	            		$query = "UPDATE `item` SET `order_id` = '$orderid' WHERE `id` = '$dbid'";
						$results = mysqli_query($conn, $query); 
	            				
	            		$myquery = "INSERT INTO `activity_hist`(`order_id`, `stage`, `timestamp`) VALUES ('$orderid' , 1, CURRENT_TIMESTAMP)";
	            		$results = mysqli_query($conn, $myquery);
            		}					
				}
            	?>

            	<br><br><br>
            	<p style="width: 90%">
		    		This is a simple website to demonstrate the process flow of our postcard idea. This website is meant to be used by KrisShop employees to update the status of the postcard deliveries in the database. Refer to the following figure for the structure of the databases.
		    	</p>
		    	<img src="diagram.png" alt="diagram" width = 60%>

		    	<p>
		    		There are five stages in the process.
		    		<ol>
		    			<li>The postcard are received in KrisShop (ORDER PLACED)</li>
		    			<li>The gift is packaged together with the postcard (GIFT PACKAGING)</li>
		    			<li>The package has left KrisShop (ORDER SENT)</li>
		    			<li>The package has received at the postal office (ORDER SENT)</li>
		    		</ol>
		    		Additionally, there is another page (SINGPOST) that is supposed to be connected to SINGPOST API.
		    	</p>

		    	<p>
		    		This website is made using the following languages:
		    	</p>
		    	<table style="width: 30%">
		    		<td><img src = htmllogo.png width=100%></td>
		    		<td><img src = phplogo.png width=100%></td>
		    		<td><img src = mysqllogo.png width=100%></td>
		    	</table>
            </td>
        </tr>

		    </td>
		    <td class="tg-0pky"></td>
		  </tr>
		  <tr>
		    <td class="tg-hfk9" colspan="8" height = 20px style="color:white">CREATION BY MAKNA</td>
		  </tr>
		</table></div>

	</body>
</html>