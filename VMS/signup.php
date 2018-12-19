<?php
	session_start();
	include ("db.php");
	if(isset($_POST["submit"]))
	{
		$v_name = $_POST["txtname"];
		$v_no=$_POST["txtno"];
		$v_user=$_POST["txtuser"];
		$_SESSION["user"]=$v_user;		//abhi
		$v_pass=$_POST["txtpass"];
		$v_carname=$_POST["txtcar"];
		$v_email=$_POST["txtemail"];
		$v_add=$_POST["txtadd"];
		$v_gen=$_POST["male"];
		mysqli_query($v_con,"insert into customer values(0,'$v_name','$v_user','$v_pass','$v_no','$v_carname','$v_add','$v_gen','$v_email')")or die (	mysqli_error($v_con));
		header("location:homecustomer.php");
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
        <li><a href="login.php">Login</a></li>
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
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/01.png');">
  <div id="pageintro" class="hoc clear" align="center"> 

    <!-- ################################################################################################ -->
      <form id="form1" name="form1" method="post" action="" style="padding-left:40%;padding-top:8%; color:#000000">
<table width="200" border="1" style="background:#333333">
  <tr>
    <td>Name</td>
    <td>:</td>
    <td>
        <input  name="txtname" type="text" id="txtname" />    </td>
  </tr>
  <tr>
    <td>Mobile no </td>
    <td>:</td>
    <td><input name="txtno" maxlength="10" type="number" id="txtno" /></td>
  </tr>
  
  <tr>
  	<td>Username</td>
	<td>:</td>
	<td><input name="txtuser" maxlength="10" type="text" id="txtuser" /></td>
  </tr>
  <tr>
  	<td>Password</td>
	<td>:</td>
	<td><input name="txtpass" maxlength="10" type="password" id="txtpass" /></td>
  </tr>
  <tr>
  	<td>Car Model</td>
	<td>:</td>
	<td><input name="txtcar" type="text"></td>
  </tr>
  <tr>
    <td>Gender</td>
    <td>:</td>
    <td><input name="male" type="radio" value="Male" />
    Male 
    <input name="male" type="radio" value="Female" />
    Female</td>
  </tr>
  <tr>
    <td>E mail </td>
    <td>:</td>
    <td><label>
      <input name="txtemail" type="email" id="txtemail" />
    </label></td>
  </tr>
  <tr>
    <td>Address</td>
    <td>:</td>
    <td><label>
      <input name="txtadd" type="text" id="txtadd" />
    </label></td>
  </tr>
  <tr>
    <td colspan="3" align="center"><label>
      <input name="submit" align="" type="submit" id="submit" value="Submit" />
    </label></td>
    </tr>
</table>
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