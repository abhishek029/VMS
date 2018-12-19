<?php
session_start();
global $v_session;
if(isset($_SESSION["user"]))
{
	$v_session=$_SESSION["user"];
echo $v_session;
}

?>
<?php
	include ("db.php");
	if(isset($_POST["submit"]))
	{
		$car_id=$_POST["txtcarid"];
		$v_model=$_POST["txtmodel"];
		$v_mdate=$_POST["txtdate"];
		$v_price=$_POST["txtprice"];
		$v_chasis=$_POST["txtno"];
		mysqli_query($v_con,"insert into car values('$car_id','$v_model','$v_mdate','$v_price','$v_chasis')")or die (mysqli_error($v_con));
		header('location:car.php');
	}
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
        <li><a href="login.php">LogOut</a></li>
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
      <li><a href="customer.php">Customer</a>
      </li>
	 <li><a class="drop" href="">Car</a>
	  <ul>
          <li><a href="addcar.php">Add Car</a></li>
          <li><a href="car.php">Exixting Cars</a></li>
        </ul>
		</li>
	  <li><a class="drop" href="#">Inventory</a>
        <ul>
          <li><a href="additem.php">Add Inventory</a></li>
          <li><a href="items.php">Existing Inventory</a></li>
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

<div style="padding-top:6%">
<form id="form1" name="form1" method="post" action="">
<table width="200" border="1">
  <tr>
    <td>Car Id </td>
    <td>:</td>
    <td>
        <input name="txtcarid" type="text" id="txtcarid" />    </td>
  </tr>
  <tr>
    <td>Car Model </td>
    <td>:</td>
    <td><label>
      <input name="txtmodel" type="text" id="txtmodel" />
    </label></td>
  </tr>
  <tr>
    <td>Manufacture Date </td>
    <td>:</td>
    <td><label>
      <input name="txtdate" type="date" id="txtdate" />
    </label></td>
  </tr>

  <tr>
    <td>Price</td>
    <td>:</td>
    <td><label>
      <input name="txtprice" type="text" id="txtprice" />
    </label></td>
  </tr>
  <tr>
    <td>Chasis No </td>
    <td>:</td>
    <td><label>
      <input name="txtno" type="text" id="txtno" />
    </label></td>
  </tr>
  <tr>
    <td colspan="3"><label>
      <input name="submit" type="submit" id="submit" value="Submit" />
    </label></td>
    </tr>
</table>
</form>
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