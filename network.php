<?php
include('include/db_connect.php');
session_start();
?>
<?php
if(!isset($_SESSION['mobile'])){
echo "<script>window.location.href='login-signup.php';</script>";
}

$username=$_SESSION['mobile'];
$queer="select * from login_net where mobile='$username'";
$run_queer=mysqli_query($con,$queer);
$user_row=mysqli_fetch_array($run_queer,MYSQLI_ASSOC);
$count=mysqli_num_rows($run_queer);

$queer1="select * from seller where email_id='$username'";
$run_queer1=mysqli_query($con,$queer1);
$user_row1=mysqli_fetch_array($run_queer1,MYSQLI_ASSOC);
$count1=mysqli_num_rows($run_queer1);

if($count>0){
$usernameid=$user_row['user_id'];
$_SESSION['user_id']=$usernameid;
}elseif($count1>0){
$usernameid=$user_row1['id'];
$_SESSION['user_id']=$usernameid;

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
    
    <meta content="Network" name="keywords"/>
        <meta content="create category of your product and services  on comumart.com" name="description"/>

<script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/c9747d0d71018b2b45258817c/b4fc09f7cf705d09940ab2a97.js");</script>
</head>
<body>
<div class="header">
	<nav class="navbar navbar-default" role="navigation">
		<div class="agileits_top_menu">
					<div class="navbar-header">
					<a href="index.php" style="color:#fff">C<i class="glyphicon glyphicon-globe" style="font-size:30px; "></i>mumart</a>
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#parents">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					
				</button>
					
					</div>
		
					<div class="collapse navbar-collapse" id="parents" >
						
							<ul class="nav navbar-nav">
    							    	<li><a href="index.php" style="color:#B3B6B7;font-size:12px">Home</a></li>
									<li><a href="network.php" style="color:#B3B6B7;font-size:12px"><div class="globe-container" id="roh">
	   
	</div></a></li>
	                         	
								<li><a href="profile.php" style="color:#B3B6B7;font-size:12px">Profile</a></li>
								<li><a href="logout.php" style="color:#B3B6B7;font-size:12px">Logout</a></li>
							</ul>
						
					</div>
			</div>
		</nav>
	</div>

<div class="container">
<div class=" visible-xs" style="float:left">
  <div>
    <button class="btn btn-default navbar-btn" data-toggle="collapse" data-target="#filter-sidebar" >
      <i class="fa fa-chevron-right"></i> <i class="fa fa-chevron-right"></i> 
    </button>
  </div>
</div>
</div>

<div class="container">

  <div class="row">

    <!-- filter sidebar -->
    <div id="filter-sidebar" class="col-xs-6 col-sm-3 col-md-3visible-sm visible-md visible-lg collapse sliding-sidebar">

      <div >
        <h5 data-toggle="collapse" data-target="#group-1" style="font-size:17px">
          Products/Services
        </h5>
        <div id="group-1" class="list-group collapse in" >
<?php
$pro="select *from network group by product_type";
$output=mysqli_query($con,$pro);
while($rows=mysqli_fetch_array($output,MYSQLI_ASSOC)){?>
        <a class='list-group-item' id="<?php echo $rows['product_type'];?> " onclick="func(this);">
            <?php echo $rows['product_type'];?>
          </a>
<?
}
?>



        </div>
      </div>
</div>
<div class="col-sm-5" >
	<div class="product-sec1">
<form method="post" action="" enctype="multipart/form-data" id="uploading" >
<div>
<input type="text" name="product_type" placeholder="product type/services" required>
<textarea name="details" style="width:100%; height:80px;border:none" placeholder="Enter your product/advertisement details"></textarea>
</div>
<img id='img-upload'/>
<div class="file-upload">
		
		<div class="container"><div class="col-md-3 col-sm-2 col-xs-6"> <label for="upload" class="file-upload__label" style="float:left">upload</label><input type="file" name="imgInp" accept="images" id="imgInp" class="file-upload__input" style="float:left"></div>
		<div class="col-md-3 col-sm-2 col-xs-6"><input type="submit" id="post"  name="post" value="post"  class="btn btn-primary"></div></div>
</div>
</form>
	</div>
<div id="data">

</div>
</div>

<div  class="col-sm-4 ">
	<div class="product-sec1" ><h4 class="heading">Business News</h4><div id="news" style="word-wrap:break-word"></div>

	</div>
</div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>
<script>
	$(document).ready(function(){
 
		$(document).on('click', '.like', function(){
			var id=$(this).val();
			var $this = $(this);
			$this.toggleClass('like');
			if($this.hasClass('like')){
				$this.text('Like'); 
			} else {
				$this.text('unlike');
				$this.addClass("unlike"); 
			}
				$.ajax({
					type: "POST",
					url: "handler.php",
					data: {
						id: id,
						like: 1,
					},
					success: function(){
						showLike(id);
					}
				});
		});
 
		$(document).on('click', '.unlike', function(){
			var id=$(this).val();
			var $this = $(this);
			$this.toggleClass('unlike');
			if($this.hasClass('unlike')){
				$this.text('Unlike'); 
			} else {
				$this.text('Like');
				$this.addClass("like"); 
			}
				$.ajax({
					type: "POST",
					url: "handler.php",
					data: {
						id: id,
						like: 1,
					},
					success: function(){
						showLike(id);
					}
				});
		});
 
	});

	function showLike(id){
		$.ajax({
			url: 'handler.php',
			type: 'POST',
			async: false,
			data:{
				id: id,
				showlike: 1
			},
			success: function(response){
				$('#show_like'+id).html(response);
 
			}
		});
	}

	$(document).ready(function(){
		$(document).on('click', '.mycom', function(){
			var id=$(this).val();
			var $this = $(this);
			$('#show'+id).toggle();
				setInterval(function(){
				$('#display'+id).load("comments.php",{id:id});
				$('#show_comment'+id).load("comments.php",{cid:id});
				},1000);
		});
});

	$(document).ready(function(){
		$(document).on('click', '.like', function(){
			var id=$(this).val();
				setInterval(function(){
				$('#show_like'+id).load("comments.php",{lid:id});
				},1000);
		});
});

	$(document).ready(function(){
		$(document).on('click', '.unlike', function(){
			var id=$(this).val();
				setInterval(function(){
				$('#show_like'+id).load("comments.php",{lid:id});
				},1000);
		});
});

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


$(document).ready(function(){

	$("#data").load('data.php');

});


function post(x)
{

  var comments =document.getElementsByClassName("comment");
  var postids = document.getElementsByClassName("postid");

var comment=comments[x].value;
var postid=postids[x].value;

  if(comment && postid)
  {
    $.ajax
    ({
      type: 'post',
      url: 'handler.php',
      data: 
      {
         user_comm:comment,
	     postid:postid
      },
      success: function (response) 
      {
	
	    document.getElementsByClassName("comment")[x].value="";
        
  
      }
    });
  }
  
  return false;
}
/*
$(document).ready(function(){
setInterval(function(){
	$("#data .all_comments").load('comments.php');
},2000);
});*/

$("#data").mousemove(function(){
$("#data .all_comments").load("comments.php");

});


function func(editable){
var product_type=editable.id;
		$("#data").load("data.php",{
		product_type:product_type
});

}



$(document).ready(function(){
	$(".product-sec1 #news").load('news.php');
});

</script>

<script>

	</script>
  <script src="js/jquery.bootstrap-dropdown-hover.js"></script>
  <script src="js/data.js"></script>
<?php
include('include/db_connect.php');
if(isset($_POST['post'])){
	if(isset($_POST['product_type'])){
$image=$_FILES['imgInp']['name'];
$mobile=$_SESSION['mobile'];
$temp_name=$_FILES['imgInp']['tmp_name'];
move_uploaded_file($temp_name,"img/$image");
$details=$_POST['details'];
$product_type=$_POST['product_type'];
$query="insert into network (id,mobile,details,product_type,image) values('NULL','".mysqli_real_escape_string($con,$mobile)."','".mysqli_real_escape_string($con,$details)."','".mysqli_real_escape_string($con,$product_type)."','".mysqli_real_escape_string($con,$image)."')";
$run=mysqli_query($con,$query);
}
else{echo "<script>alert('please enter the product type');</script>";}

}
if(isset($_GET['comment'])){
$comment=$_GET['comment'];
$usermobile=$_SESSION['mobile'];
$sel="select name from login_net where mobile ='$usermobile'";
$result=mysqli_query($con,$sel);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$name=$row['name'];
$postid=$_GET['postid'];
$query="insert into likes_comments(name,post_id,likes,comment) values('$name','$postid','','$comment')";
$result=mysqli_query($con,$query);

echo "success";
}

?>


