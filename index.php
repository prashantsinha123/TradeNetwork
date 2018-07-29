<?php
session_start();
include("include/db_connect.php");

if(isset($_SESSION['mobile'])){
		echo "<script>window.location.href='network.php';</script>";
}
?>
<!DOCTYPE html>
<head>
<meta name="google-site-verification" content="DbiRMXp4rJwSfTebpqoCQ2_cGbe51-vUPrOyAUzxwok" />

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TVZ44D3');</script>
<!-- End Google Tag Manager -->

<title>ComuMart</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/networks.css">


<title>Marketplace for Manufacturer Wholesaler Transporter</title>
    
    <meta content="Manufacturers, Suppliers, Exporters, Importers, Products, Trade Leads, Supplier, Manufacturer, Exporter, Importer, Buy rice, rice, best rice, rice items, buy rice online, get rice quotation, rice online, rice shop, buy rice online, buy rice items online,crude rice oil, get quotation crude rice oil, rice oil, crude rice bran oil" name="keywords"/>
        <meta content="Find quality Manufacturers, Suppliers, Exporters, Importers, Buyers, Wholesalers, Products Quotation and Freight Quotation from our website. Import & Export on comumart.com" name="description"/>

<script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/c9747d0d71018b2b45258817c/b4fc09f7cf705d09940ab2a97.js");</script>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>
  <script src="js/jquery.bootstrap-dropdown-hover.js"></script>
</head>


<div class="header">
	<nav class="navbar navbar-default" role="navigation">
		<div class="agileits_top_menu">
					<div class="navbar-header">
					<a href="../index.php" style="color:#fff">C<i class="glyphicon glyphicon-globe" style="font-size:30px; "></i>mumart</a>
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#parents">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					
				</button>
					
					</div>
		
					<div class="collapse navbar-collapse" id="parents" >
						<form action="" method="post">
							<ul class="nav navbar-nav">
								<li><input type="text" name="login_mobile" placeholder="Mobile number" id="editing_net" required onkeypress="return Valid(event)" maxlength="10"></li>
								<li><input type="password" name="login_password" placeholder="Password" id="editing_net" required></li>
								<li><button type="submit" class="btn btn-default" name="login_net" style="margin-top:10px" >Login</button></li>
						</form>
								<li><a href="#" data-toggle="modal" data-target="#network_forget" style="color:#B3B6B7;font-size:12px" >Forgot Password?</a></li>
							</ul>
						
					</div>
			</div>
		</nav>
	</div>
<div><img src="Comumart.jpg" style="width:100%;height:auto;opacity:0.8"></div>
  <form  method="post" id="signup_form" name="signup_form" role="form">
    <div class="contain">
      <h2>Signup</h2>

      <label><b>Name</b></label>
      <input type="text" class="log_net" placeholder="Enter your name" name="name" required>

      <label><b>Mobile</b></label>
      <input type="text" class="log_net" placeholder="Enter your mobile number" name="mobile" onkeypress="return Valid(event)" maxlength="10" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" class="log_net" placeholder="Enter Password" name="psw" required>
<div id="net_msg"></div>
      <button type="submit" class="btn btn-success" name="net_login">Signup</button>

    </div>
  </form>
</div>


<div class="modal fade" id="network_forget" role="dialog" >
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
		<div class="modal-body">
			<div class="modal-body-left">
				<h1>Forgot Password</h1>
	
				<div style="overflow:hidden">
					<input type="text" placeholder="Enter the mobile number" id="sforget_email" onkeypress="return Valid(event)" maxlength="10" required>
				</div>
				<div style="overflow:hidden">
					<input type="password" placeholder="Enter New Password"  id ="sforget_password" required>
				</div>
				<div style="overflow:hidden">
					<input type="password" placeholder="Confirm New Password"  id ="sforget_repassword" onChange="checkPasswordMatches1();" required>
				</div>
				<div id="wrong1"></div>
				<div style="overflow:hidden">
					<button  class="btn btn-success" id="sforget_submit">Change</button>
				</div>

			

			</div>

		</div>
		</div>
	</div>
</div>

<div id="download_modal" class="modal fade bs-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content" id="dialog-download">
           <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
	  </div>
		<div class="modal-body">
			<div class="modal-body-left">
				<h4 style="text-align:center">VERIFICATION</h4>
				<p>Enter the Verification code sent to your mobile.</p>
			
			
				<div style="overflow:hidden">
					<input type="text" placeholder="Verification code" name="verification" id="verification" required>
				</div>
				<div id="mistake"></div>
				<div style="overflow:hidden">
					<button  value="Verify" name="verify" id="verify" class="btn btn-success">Verify</button>
				</div>
			
			</div>
		</div>
         </div>
     </div>
</div>

<div id="sforget_modal" class="modal fade bs-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content" id="dialog-download">
           <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
	  </div>
		<div class="modal-body">
			<div class="modal-body-left">
				<h4 style="text-align:center">VERIFICATION</h4>
				<p>Enter the Verification code sent to your mobile.</p>
			
			
				<div style="overflow:hidden">
					<input type="text" placeholder="Verification code" id="seller_forget_verify" required>
				</div>
				<div id="mistaken1"></div>
				<div style="overflow:hidden">
					<button  id="sforget_verify" class="btn btn-success">Verify</button>
				</div>
			
			</div>
		</div>
         </div>
     </div>
</div>

<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

<script src="js/data.js"></script>

<?php
if(isset($_POST['login_net'])){
         if(strlen($_POST['login_mobile'])==10){
		if(!empty($_POST['login_mobile']) && !empty($_POST['login_password'])){
		$email1=htmlspecialchars($_POST['login_mobile'], ENT_QUOTES, 'UTF-8');
		$b_password=sha1($_POST['login_password']);
	$query1="select * from login_net where mobile='".mysqli_real_escape_string($con,$email1)."' AND password='".mysqli_real_escape_string($con,$b_password)."'";
	$query_run1=mysqli_query($con,$query1);
	$customer_count=mysqli_num_rows($query_run1);
	if($customer_count==0){
			echo "<script>alert('User does not exists!');</script>";
		}
	else{
		$_SESSION['mobile']=$email1;
		echo "<script>window.location.href='network.php';</script>";
}
}else{
	echo "<script>alert('Please fill all the inputs');</script>";
}
}else{echo "<script>alert('Please enter 10 digit mobile number!');</script>";}
}



?>















