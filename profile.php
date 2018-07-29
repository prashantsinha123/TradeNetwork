<?php
include('include/db_connect.php');
session_start();
?>
<?php
if(!isset($_SESSION['mobile'])){
echo "<script>window.location.href='login-signup.php';</script>";
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
<link rel="stylesheet" href="css/comu.css">
<link rel="stylesheet" href="css/style.css">

<link rel="stylesheet" href="css/networks.css">


<title>Marketplace for Manufacturer Wholesaler Transporter</title>
    
    <meta content="Manufacturers, Suppliers, Exporters, Importers, Products, Trade Leads, Supplier, Manufacturer, Exporter, Importer, Buy rice, rice, best rice, rice items, buy rice online, get rice quotation, rice online, rice shop, buy rice online, buy rice items online,crude rice oil, get quotation crude rice oil, rice oil, crude rice bran oil" name="keywords"/>
        <meta content="Find quality Manufacturers, Suppliers, Exporters, Importers, Buyers, Wholesalers, Products Quotation and Freight Quotation from our website. Import & Export on comumart.com" name="description"/>

<script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/c9747d0d71018b2b45258817c/b4fc09f7cf705d09940ab2a97.js");</script>
</head>
<body>
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
						
							<ul class="nav navbar-nav">
							    	<li><a href="../index.php" style="color:#B3B6B7;font-size:12px">Home</a></li>
									<li><a href="network.php" style="color:#B3B6B7;font-size:12px"><div class="globe-container" >
	    <div class="globe"></div>
	</div></a></li>
								<li><a href="profile.php" style="color:#B3B6B7;font-size:12px">Profile</a></li>
								<li><a href="logout.php" style="color:#B3B6B7;font-size:12px">Logout</a></li>
							</ul>
						
					</div>
			</div>
		</nav>
	</div>
<?php
$user=$_SESSION['mobile'];
$query="select * from network where mobile='$user' ";
$result=mysqli_query($con,$query);
$query1="select * from login_net where mobile='$user'";
$res=mysqli_query($con,$query1);
$row=mysqli_fetch_array($res,MYSQLI_ASSOC);
$user_id=$row['user_id'];
$name=$row['name'];
$url=$row['b_url'];
$email=$row['email_id'];
?>

<div class="navbar navbar-default visible-xs">
  <div>
    <button class="btn btn-default navbar-btn" data-toggle="collapse" data-target="#filter-sidebar">
      <i class="fa fa-chevron-right"></i> <i class="fa fa-chevron-right"></i> 
    </button>
  </div>
</div>

<div class="container">

  <div class="row">

    <!-- filter sidebar -->
    <div id="filter-sidebar" class="col-xs-6 col-sm-3 col-md-3visible-sm visible-md visible-lg collapse sliding-sidebar">

      <div >
        <h4 data-toggle="collapse" data-target="#group-1">
          Details
        </h4>
        <div id="group-1" class="list-group collapse in" >
        <a class='list-group-item' >Name:
<span><i class="editing" onBlur="saveToDatabase(this,'name','<?php echo $user_id;?>')"><?php echo $name?></i></span></a>
       <a class='list-group-item' >Business Url:
<span><i class="editing" onBlur="saveToDatabase(this,'b_url','<?php echo $user_id;?>')"><?php echo $url?></i></span></a>
       <a class='list-group-item' >Email-id:
<span><i class="editing" onBlur="saveToDatabase(this,'email_id','<?php echo $user_id;?>')"><?php echo $email?></i></span>Hyperlink Code</a>
        <a class='list-group-item' >Mobile:
<span><?php echo $user?></span></a>
        </div>
      </div>
</div>

<div class="col-sm-6">
	<div id="data">
<?php
while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){

$id=$row['id'];
$product=$row['product_type'];
$details=urldecode($row['details']);
$image=$row['image'];
$mobile=$row['mobile'];
$time=$row['timestamp'];


?>


		<div class="product-sec1">
			<div>
<label>Product Type: <i class="editing" onBlur="saveToDatabase(this,'product_type','<?php echo $id;?>')"><?php echo $product;?></i></label><span style="float:right"><button ><i class="glyphicon glyphicon-remove " onclick="deleteFromDatabase(this,'<?php echo $id;?>')"></i></button></span> 
			</div><br>

<div style="margin-bottom:12px;" class="wrapper">
	<i class="editing" onBlur="saveToDatabase(this,'details','<?php echo $id;?>')"><?php echo $details;?></i>
</div>
<form id='upload_img' action='handler.php' method='post' enctype="multipart/form-data" >
<div >
		
		<input type="file" name="imgInp" accept="images" >
		<input type="hidden" name="photo_id" value="<?php echo $id;?>">
	<input type="submit" id="post"  name="picupdate" value="post"  class="btn btn-primary" >
</div>

</form>

<div>
	<img  src="img/<?php echo $image;?>" style="width:100%;height:auto" class="responsive">
</div>
</div>



<?php }?>
</div>
</div>
</div>
</div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script type="text/javascript">

$(document).ready( function() {

		function readURL(input) {
		    if (input.files && input.files[0]) {
		        var reader = new FileReader();
		        
		        reader.onload = function (e) {
		            $('#img-upload').attr('src', e.target.result);
		        }
		        
		        reader.readAsDataURL(input.files[0]);
		    }
		}

		$("#imgInp").change(function(){
		    readURL(this);
		}); 	


	});


function saveToDatabase(editableObj,column,id){
$(editableObj).css("background","#FFF url(loaderIcon.gif) no-repeat right");
var encoded=encodeURIComponent(editableObj.innerHTML);
$.ajax({
				url: "handler.php",
				type: "POST",
				data:'column='+column+'&editval='+encoded+'&id='+id,
				success: function(data){
					
			$(editableObj).css("background","#FDFDFD");
			
			
				}        
		   });

}
function deleteFromDatabase(editableObj,ids){
$(editableObj).css("background","#FFF url(loaderIcon.gif) no-repeat right");
$.ajax({
				url: "handler.php",
				type: "POST",
				data:'ids='+ids,
				success: function(data){
					
			$(editableObj).css("background","#FDFDFD");
			setTimeout(function(){location.reload();   },1000);
			
				}        
		   });

}


			$(document).ready(function(){
			
			  $('.editing').addClass('editable');
			  $('.editing').attr('contenteditable', 'true');  
		
			});

</script>




