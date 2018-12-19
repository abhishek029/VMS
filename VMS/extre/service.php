<?php
session_start();
global $v_session;
if(isset($_SESSION["user"]))
{
	$v_session=$_SESSION["user"];
}

?>
<?php
	include ("db.php");
	if(isset($_POST["Submit"]))
	{
		$v_cid=$_POST["txtcid"];
		$v_cost=0;
		$v_work="";
		if(isset($_POST["oil"]))
		{
			$v_cost=$v_cost+$_POST["oil"];
			$v_work=$v_work."Oil Change,";
		}
		if(isset($_POST["wheel"]))
		{
			$v_cost=$v_cost+$_POST["wheel"];
			$v_work=$v_work."Wheel-Allignment,";
		}
		if(isset($_POST["wash"]))
		{
			$v_cost=$v_cost+$_POST["wash"];
			$v_work=$v_work."Car-Wash,";
		}
		if(isset($_POST["engine"]))
		{
			$v_cost=$v_cost+$_POST["engine"];
			$v_work=$v_work."Engine-Service,";
		}
			
		$v_meter=$_POST["txtmeter"];
		$v_start=$_POST["txtdate"];
		mysqli_query($v_con,"insert into service values(0,'$v_cid','$v_cost','$v_meter','$v_start','$v_work')")or die (mysqli_error($v_con));
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
<body id="top" onLoad="my();">
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
          <li><a href="#">Purchase Accessories</a></li>
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
  
<form id="form1" name="form1" method="post" action="" style="padding-top:6%;padding-left:40%;padding-bottom:40px">
<table width="200" border="1" style="color:#000000">
  
  <tr>
    <td>Customer Id </td>
    <td>:</td>
    <td><label>
      <input name="txtcid" type="text" id="txtcid" />
    </label></td>
  </tr>
  <tr>
    <td>Start Date </td>
    <td>:</td>
    <td><label>
      <input name="txtdate" type="date" id="txtdate" />
    </label></td>
  </tr>
  <tr>
    <td>Meter reading </td>
    <td>:</td>
    <td><label>
      <input name="txtmeter" type="number" id="txtmeter" />
    </label></td>
  </tr>
  <tr>
    <td>Work</td>
    <td>:</td>
    <td>
		<script type="text/javascript">
		function my()
		{
			document.getElementById("myradio1").disabled = true;
			document.getElementById("myradio2").disabled = true;
			document.getElementById("myradio3").disabled = true;
			document.getElementById("myradio4").disabled = true;
		}
		function myfunction()
		{
			document.getElementById("myradio1").disabled = true;
			document.getElementById("myradio2").disabled = true;
			document.getElementById("myradio3").disabled = true;
			document.getElementById("myradio4").disabled = true;
			
		<?php
			$v_cost=6500;
			$v_work="Special-Service,";
		?>
		}
		function myfunction1()
		{
			document.getElementById("myradio1").disabled = false;
			document.getElementById("myradio2").disabled = false;
			document.getElementById("myradio3").disabled = false;
			document.getElementById("myradio4").disabled = false;
		}
		</script>
		<legend>Servicing</legend>
		<input name="special" type="radio" value="service"  onclick="myfunction1()"/>Servicing<br />
      <input name="oil" type="checkbox" value="250" id="myradio1"/>
    Oil Change <br />
    <input name="wheel" type="checkbox" value="500" id="myradio2"/>
    Wheel Alignment <br />
    <input name="wash" type="checkbox" value="200" id="myradio3"/>
    Car Wash <br />
    <input name="engine" type="checkbox" value="5500" id="myradio4"/>
    Engine Service <br />
    <input name="special" type="radio" value="6500" onClick="myfunction()"/>
    Special Service <br />
	</label></td>
  </tr>
 
  <tr>
    <td colspan="3" align="center"><label>
      <input type="submit" name="Submit" value="Submit" />
    </label></td>
  </tr>
</table>
</form>
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