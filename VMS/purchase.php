<?php
session_start();
global $v_session;
if(isset($_SESSION["user"]))
{
	$v_session=$_SESSION["user"];
}
	include ("db.php");
	if(isset($_POST["submit"]))
	{
		$date = date('Y-m-d');
		$v_BillId=mysqli_insert_id($v_con);
		$total = 0;
		$query = "insert into bill(order_id,cust_id,date) values(0,$v_session,'".$date."')";
		for($i=1;$i<$_POST["hidItems"];$i++)
		{ 		
			if(isset($_POST["txtorder$i"]))
			{
				$item_id=$_POST["hidItemId$i"];
				$v_Qty=$_POST["qty$i"];
				$v_price=$_POST["hidItemPR$i"]; //$v_data[3];
				$query1 = "insert into bill_data values($v_BillId,'$item_id',$v_Qty,$v_price)";
				$total += $v_price * $v_Qty;
				//$a = mysqli_query($v_con,"select qty from items where item_id = '$item_id'");
				$q = "update items set qty = qty - $v_Qty where item_id = '$item_id'";
		     	mysqli_query($v_con,$q) or die (mysqli_error($v_con));
				
				mysqli_query($v_con,$query1)or die (mysqli_error($v_con));	
			}
		}
		echo $total;
		$query = "insert into bill(total) values($total)";
		mysqli_query($v_con,$query)or die (mysqli_error($v_con));
	}
?>
<!DOCTYPE html>
<html lang="">
<head>
<title>Vehicle Maintenance Sysytem</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top" onLoad="myfunction()">
<!-- ################################################################################################ -->
<div class="wrapper row0">
  <div id="topbar" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div class="fl_left">
      <ul>
        <li><i class="fa fa-phone"></i> +02647 252525</li>
        <li><i class="fa fa-envelope-o"></i> vms@gmail.com</li>
      </ul>
    </div>
    <div class="fl_right">
      <ul>
        <li><a href="#"><i class="fa fa-lg fa-home"></i></a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="signup.php">Register</a></li>
      </ul>
    </div>
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<div class="wrapper row1">
  <header id="header" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div id="logo" class="fl_left">
      <h1><a href="index.html">Vehicle Maintenance System</a></h1>
    </div>
    <div id="quickinfo" class="fl_right">
      <ul class="nospace inline">
        <li><strong>Praesent:</strong><br>
          +00 (123) 456 7890</li>
        <li><strong>Faucibus:</strong><br>
          +00 (123) 456 7890</li>
      </ul>
    </div>
    <!-- ################################################################################################ -->
  </header>
  <nav id="mainav" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <ul class="clear">
      <li class="active"><a href=""><?php echo $v_session;?></a></li>
      <li><a class="drop" href="#">Profile</a>
        <ul>
          <li><a href="viewprofile.php">View Profile</a></li>
          <li><a href="editprofile.php">Edit Profile</a></li>
        </ul>
      </li>
	  <li><a href="viewcar.php">Car Information</a></li>
	  <li><a class="drop" href="#">Accessories</a>
        <ul>
          <li><a href="viewassecories.php">View Accessories</a></li>
          <li><a href="purchase.php">Purchase Accessories</a></li>
        </ul>
      </li>
      <li><a href="service.php">Book a service</a></li>
      <li><a href="#">Contact Us</a></li>
    </ul>
    <!-- ################################################################################################ -->
  </nav>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/01.png');">
  <div id="pageintro" class="hoc clear"> 

    <!-- ################################################################################################ -->
	<script type="text/javascript">
	
	function myfunction()
	{
		document.getElementById("qty").disabled = true;
	}
	var i = 0;
	function myfunction1(v_Control)
	{
	if(document.getElementById("txtorder"+v_Control).checked==true)
		{
			document.getElementById("qty"+v_Control).disabled = false;
			i = i + 1;
		}
		else
		{
			document.getElementById("qty"+v_Control).disabled = true;
			i = 0;
		}
	}
	</script>
	<form method="post" action="">
	 <?php
	 $i=1;
		echo '<table> <tr><th>Item Name</th><th>Price</th><th>Quantity Left</th><th>Ordered Quantity</th><th>Select Items</th></tr>';
		$v_query=mysqli_query($v_con,"select * from items")or die (mysqli_error($v_con));
		while($v_data=mysqli_fetch_array($v_query))
		{
			echo "<tr>
				<td>$v_data[2]<input name='hidItemId$i' type='hidden' value='$v_data[0]'><input name='hidItemPR$i' type='hidden' value='$v_data[3]'></td>
				<td>$v_data[3]</td>
				<td>$v_data[4]</td>
				<td>
					<select name='qty$i' id='qty$i' disabled=true>
						<option value='1'>1</option>
						<option value='2'>2</option>
						<option value='3'>3</option>
						<option value='4'>4</option>
						<option value='5'>5</option>
					</select>
				</td>
				<td><input name='txtorder$i' type='checkbox' onChange='myfunction1($i)' id='txtorder$i' value='true'></td>
				</tr>";
				$i++;
		}
		echo "<tr><td colspan='6' align='center'>";
	?>
	<input name='submit' type='submit' id='submit' value='Generate Order' /></td></tr></table>
	<input name="hidItems" type="hidden" value="<?php echo $i; ?>">
	</form>
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<div class="wrapper row4 bgded overlay" style="background-image:url('images/demo/backgrounds/03.png');">
  <footer id="footer" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div class="one_third first">
      <h6 class="heading">Facilisis neque vestibulum</h6>
      <ul class="nospace btmspace-30 linklist contact">
        <li><i class="fa fa-map-marker"></i>
          <address>
          Street Name &amp; Number, Town, Postcode/Zip
          </address>
        </li>
        <li><i class="fa fa-phone"></i> +00 (123) 456 7890</li>
        <li><i class="fa fa-fax"></i> +00 (123) 456 7890</li>
        <li><i class="fa fa-envelope-o"></i> info@domain.com</li>
      </ul>
    </div>
    <div class="one_third">
      <h6 class="heading">Auctor egestas quisque</h6>
      <p class="nospace btmspace-30">Ut ipsum quisque luctus aliquam accumsan sapien quis magna etiam quis.</p>
      <form method="post" action="#">
        <fieldset>
          <legend>Newsletter:</legend>
          <input class="btmspace-15" type="text" value="" placeholder="Name">
          <input class="btmspace-15" type="text" value="" placeholder="Email">
          <button type="submit" value="submit">Submit</button>
        </fieldset>
      </form>
    </div>
    
    <!-- ################################################################################################ -->
  </footer>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row5">
  <div id="copyright" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <p class="fl_left">Copyright &copy; 2016 - All Rights Reserved - <a href="#">Domain Name</a></p>
    <p class="fl_right">Template by <a target="_blank" href="http://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>