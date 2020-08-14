<!DOCTYPE html>
<html lang="en">
<LINK rel="stylesheet" type="text/css" href="stylesheet.css">
	<?php 
		echo "";echo "";echo "";echo "";echo "";echo "";echo "";echo "";echo "";echo "";
		include "db_init.php";


		echo "Success";
	?>
	<head>
		<TITLE>SINGPOST</TITLE>
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
		    <td class="tg-llyw" style="color: #dcdcdc"><a href="#"></td>
		    <td class="tg-llyw" style="color: #dcdcdc"><a href="index.php">HOME</a></td>
		    <td class="tg-llyw" style="color: #dcdcdc"><a href="Placed.php">ORDER PLACED</a></td>
		    <td class="tg-llyw" style="color: #dcdcdc"><a href="Gift.php">GIFT PACKAGING</a></td>
		    <td class="tg-llyw" style="color: #dcdcdc"><a href="Leaving.php">ORDER LEAVING</a></td>
		    <td class="tg-llyw" style="color: #dcdcdc"><a href="Sent.php">ORDER SENT</a></td>
		    <td class="tg-llyw" style="color: #dcdcdc"><a href="Singpost.php"><b>SINGPOST</b></a></td>
		    <td class="tg-llyw"></td>
		  </tr>
		  <tr>
		    <td class="tg-0pky"></td>
		    <td class="tg-0pky" colspan="8">
		    	<br><h1 style="font-family: Helvetica">Singpost API</h1><br>
		    	<?php
            	$myquery = "SELECT * FROM item LEFT JOIN products ON item.product_id = products.id WHERE stage='4' ";
            	$results = mysqli_query($conn, $myquery);
            	?>
		    	<table style="width: 90%" class = "tg">
		    		<colgroup>
					<col style="width: 5%">
					<col style="width: 16%">
					<col style="width: 16%">
					<col style="width: 16%">
					<col style="width: 16%">
					<col style="width: 16%">
					</colgroup>
		    		<tr>
		            	<td> </td>
		                <td class="tg-1pky">Order ID</td>
		                <td class="tg-1pky">Name</td>
		                <td class="tg-1pky">Timestamp</td>
		                <td class="tg-1pky">Postbox</td>
		                <td class="tg-1pky">Stage</td>
            		</tr>
            <?php
            while($row = mysqli_fetch_array($results)) {
            ?>
            	<tr>
                	<td class="tg-1pky"></td>
                    <td class="tg-1pky"><?php echo $row['order_id']?></td>
                    <td class="tg-1pky"><?php echo $row['name']?></td>
                    <td class="tg-1pky"><?php echo $row['timestamp']?></td>
                    <td class="tg-1pky"><?php echo $row['postbox']?></td>
                    <td class="tg-1pky"><?php echo $row['stage']?></td>
                </tr>


            <?php } ?>
            <tr class = "blank row">
            	<td colspan="6"></td>
            </tr>
		    	</table>

		    </td>
		    <td class="tg-0pky"></td>
		  </tr>
		  <tr>
		    <td class="tg-hfk9" colspan="8" height = 20px style="color:white">CREATION BY MAKNA</td>
		  </tr>
		</table></div>

	</body>
</html>