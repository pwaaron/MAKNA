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
							$stage = 3;
							
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
		<TITLE>GIFT PACKAGING</TITLE>
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
		    <td class="tg-llyw" style="color: #dcdcdc"><a href="index.php">HOME</a></td>
		    <td class="tg-llyw" style="color: #dcdcdc"><a href="Placed.php">ORDER PLACED</a></td>
		    <td class="tg-llyw" style="color: #dcdcdc"><a href="Gift.php"><b>GIFT PACKAGING</b></a></td>
		    <td class="tg-llyw" style="color: #dcdcdc"><a href="Leaving.php">ORDER LEAVING</a></td>
		    <td class="tg-llyw" style="color: #dcdcdc"><a href="Sent.php">ORDER SENT</a></td>
		    <td class="tg-llyw" style="color: #dcdcdc"><a href="Singpost.php">SINGPOST</a></td>
		    <td class="tg-llyw"></td>
		  </tr>
		  <tr>
		    <td class="tg-0pky"></td>
		    <td class="tg-0pky" colspan="8">
		    	<br><h1 style="font-family: Helvetica">Gift Packaging Database</h1><br>
		    	<?php
            	$myquery = "SELECT * FROM item LEFT JOIN products ON item.product_id = products.id WHERE stage='2' ";
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
            		<form action="#" method="post">
            <?php
            while($row = mysqli_fetch_array($results)) {
            ?>
            	<tr>
                	<td class="tg-1pky"><input type = 'checkbox' name = 'selected_items[]' value = <?php echo $row['order_id']?>></td>
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
            <tr>
            	<td></td>
            	<td><input type="submit" name="submit" value="Send to Next Stage"/></td>
            </tr>
            </form>
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