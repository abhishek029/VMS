<?php
session_start();
global $v_session;
if(isset($_SESSION["user"]))
{
	$v_session=$_SESSION["user"];
}
include ("db.php");
?>
<!DOCTYPE html>
<html lang="">
<head>
<title>Interlingua</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
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
        <li><a href="login.php">Logout</a></li>
        <li><a href="signup.php">Register</a></li>
      </ul>
    </div>
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
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
      <li><a class="drop" href="#">Customer</a>
        <ul>
          <li><a href="viewcustomer.php">View Customer</a></li>
          <li><a href="editcustomer.php">Edit Customer</a></li>
        </ul>
      </li>
	  <li><a class="drop" href="#">Car</a>
        <ul>
          <li><a href="viewcar.php">View Car</a></li>
          <li><a href="editcar.php">Edit Car</a></li>
		  <li><a href="addcar.php">Add Car</a></li>
        </ul>
      </li>
	  <li><a class="drop" href="#">Inventory</a>
        <ul>
          <li><a href="viewitem.php">View Inventory</a></li>
          <li><a href="edititem.php">Edit Inventory</a></li>
        </ul>
      </li>
      <li><a href="#">Reports</a></li>
      <li><a href="#">Long Link Text</a></li>
    </ul>
    <!-- ################################################################################################ -->
  </nav>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/01.png');">
  	<div style="padding-top:8%">
  <?php
		echo "<table> <tr><th>Item Id</th><th>Car Id</th><th>Item Name</th><th>Price</th><th>Quantity</th><th>Reorder</th></tr>";
		
		$v_query=mysqli_query($v_con,"select * from items")or die (mysqli_error($v_con));
		while($v_data=mysqli_fetch_array($v_query))
		{
			echo "<tr>
				<td>$v_data[0]</td>
				<td>$v_data[1]</td>
				<td>$v_data[2]</td>
				<td>$v_data[3]</td>
				<td>$v_data[4]</td>
				<td>$v_data[5]</td>
				</tr>";
		}
		echo "</table>";
	?>
  
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