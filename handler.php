<?php
session_start();
include('include/db_connect.php');
if(isset($_POST['name']) && isset($_POST['mobile']) && ($_POST['psw'])){
		$name=htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
		$mobile=htmlspecialchars($_POST['mobile'], ENT_QUOTES, 'UTF-8');
		
		$password=sha1($_POST['psw']);
	$_SESSION['name']=$name;
	$_SESSION['password']=$password;
	$query="select * from login_net where mobile='$mobile'";
	$run=mysqli_query($con,$query);
	$result=mysqli_num_rows($run);
	if($result==0){
              if(strlen($mobile)==10){
		
		
			$code=mt_rand(1000,9999);
			
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://control.msg91.com/api/sendotp.php?otp_length=&authkey=199209AbNfnFQtz5a8f006b&message=Your Verification code is:$code&sender=ComuMart&mobile=$mobile&otp=$code&otp_expiry=&email=",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "",
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo "success";
$_SESSION['mob']=$mobile;
}	
		
		
}else{echo "Please enter 10 digit mobile number";}
}else{echo "You already have an account";}


	}


	if(isset($_POST['code'])){
	if(!empty($_POST['code'])){
				$name1=htmlspecialchars($_SESSION['name'], ENT_QUOTES, 'UTF-8');
		$email1=htmlspecialchars($_SESSION['mob'], ENT_QUOTES, 'UTF-8');
		$pass=htmlspecialchars($_SESSION['password'], ENT_QUOTES, 'UTF-8');
		$verification = htmlspecialchars($_POST['code'], ENT_QUOTES, 'UTF-8');
		
		$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://control.msg91.com/api/verifyRequestOTP.php?authkey=199209AbNfnFQtz5a8f006b&mobile=$email1&otp=$verification",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "",
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_HTTPHEADER => array(
    "content-type: application/x-www-form-urlencoded"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
$object=json_decode($response);
if($object->type=="success"){
$query="insert into login_net(user_id,name,mobile,password) values('NULL','".mysqli_real_escape_string($con,$name1)."','".mysqli_real_escape_string($con,$email1)."','".mysqli_real_escape_string($con,$pass)."')";
$query_run=mysqli_query($con,$query);
echo "success";
$_SESSION['mobile']=$email1;
}else{echo "Incorrect code";}
	}
		}else{

		echo "Please enter the code";
}
	
}

	if( isset($_POST['sforget_email']) && isset($_POST['sforget_password']) && isset($_POST['sforget_repassword'])){

	if( !empty($_POST['sforget_email']) && !empty($_POST['sforget_password']) && !empty($_POST['sforget_repassword'])){
		
		$email=htmlspecialchars($_POST['sforget_email'], ENT_QUOTES, 'UTF-8');
		$bforget_password=sha1($_POST['sforget_password']);
		$bforget_repassword=sha1($_POST['sforget_repassword']);
	$select="select *from login_net where mobile='".mysqli_real_escape_string($con,$email)."'";
$result=mysqli_query($con,$select);
$row_count=mysqli_num_rows($result);
if($row_count!=0){
          if(strlen($email)==10){
		if($bforget_password == $bforget_repassword){


			$code=mt_rand(1000,9999);
			
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://control.msg91.com/api/sendotp.php?otp_length=&authkey=199209AbNfnFQtz5a8f006b&message=Your Verification code is:$code&sender=ComuMart&mobile=$email&otp=$code&otp_expiry=&email=",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "",
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo "success";
			$_SESSION['mob']=$email;
			$_SESSION['password']=$bforget_password;
}
		}else{echo "Please check your input";}
}else{echo "Please enter 10 digit mobile number";}
}else{echo "Data doesn't exist Please signup";}
	}else{
	echo "Please fill all the inputs";
}

}

	if(isset($_POST['scode'])){
	if(!empty($_POST['scode'])){
		$verify= htmlspecialchars($_POST['scode'], ENT_QUOTES, 'UTF-8');
		$email1=htmlspecialchars($_SESSION['mob'], ENT_QUOTES, 'UTF-8');
		$pass=htmlspecialchars($_SESSION['password'], ENT_QUOTES, 'UTF-8');
		$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://control.msg91.com/api/verifyRequestOTP.php?authkey=199209AbNfnFQtz5a8f006b&mobile=$email1&otp=$verify",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "",
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_HTTPHEADER => array(
    "content-type: application/x-www-form-urlencoded"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
$object=json_decode($response);
if($object->type=="success"){

$query="update login_net set password='".mysqli_real_escape_string($con,$pass)."' where mobile='".mysqli_real_escape_string($con,$email1)."'";
$query_run=mysqli_query($con,$query);
echo "success";
$_SESSION['mobile']=$email1;
}else{echo "Incorrect code";}
	}
		}else{ echo "Please enter the code"; }
}


if(isset($_POST['user_comm']) && isset($_POST['postid']))
{
	$usermobile=$_SESSION['mobile'];
	$sel="select name from login_net where mobile ='$usermobile'";
	$result=mysqli_query($con,$sel);
	$counting=mysqli_num_rows($result);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

	$sel1="select name from seller where email_id ='$usermobile'";
	$result1=mysqli_query($con,$sel1);
	$counting1=mysqli_num_rows($result1);
	$row1=mysqli_fetch_array($result1,MYSQLI_ASSOC);
if($counting>0){
	$name=$row['name'];
}else{
$name=$row1['name'];
}
  $comment=$_POST['user_comm'];
  $postid=$_POST['postid'];
  $query="insert into comments(name,post_id,comment,id) values('".mysqli_real_escape_string($con,$name)."','".mysqli_real_escape_string($con,$postid)."','".mysqli_real_escape_string($con,$comment)."','NULL')";
$result1=mysqli_query($con,$query);
  
if($result1){
echo "success";
  }
}

if(isset($_POST['editval'])){
$mobiler=$_SESSION['mobile'];
$query="update network set  " . $_POST["column"] . " = '".$_POST["editval"]."' WHERE mobile='$mobiler' and id='". $_POST["id"] ."'";
$result=mysqli_query($con,$query);

$query1="update login_net set  " . $_POST["column"] . " = '".$_POST["editval"]."' WHERE mobile='$mobiler' and user_id='". $_POST["id"] ."'";
$result1=mysqli_query($con,$query1);

if($result || $result1){
echo success;
}
}

if(isset($_POST['ids'])){
$mobiler=$_SESSION['mobile'];
$query2="delete from network WHERE mobile='$mobiler' and id='". $_POST["ids"] ."'";
$result2=mysqli_query($con,$query2);
if($result2){
echo success;
}

}

if(isset($_POST['picupdate'])){
	if(isset($_FILES['imgInp'])){
$image=$_FILES['imgInp']['name'];
$mobile=$_SESSION['mobile'];
$temp_name=$_FILES['imgInp']['tmp_name'];
move_uploaded_file($temp_name,"img/$image");

$pid=$_POST['photo_id'];
$query="update  network set image='$image' where id='$pid'";
$run=mysqli_query($con,$query);
header("Location: {$_SERVER['HTTP_REFERER']}");
}

}

	if (isset($_POST['like'])){		
 		$uid=$_SESSION['user_id'];
		$id = $_POST['id'];
		$query=mysqli_query($con,"select * from `likes_comments` where post_id='$id' and user_id='$uid'") or die(mysqli_error());
 
		if(mysqli_num_rows($query)>0){
			mysqli_query($con,"delete from `likes_comments` where user_id='$uid' and post_id='$id'");

		}
		else{
			mysqli_query($con,"insert into `likes_comments` (user_id,post_id) values ('$uid', '$id')");

		}
	}		



	if (isset($_POST['showlike'])){
		$id = $_POST['id'];
		$query2=mysqli_query($con,"select * from `likes_comments` where post_id='$id'");
		echo mysqli_num_rows($query2).' likes';	
	}

if(isset($_GET['seller_id'])){
$sid=$_GET['seller_id'];
echo $sid;
$query="select * from sellermeta where id='$sid'";
$running=mysqli_query($con,$query);
$rowseller=mysqli_fetch_array($running,MYSQLI_ASSOC);
	$mobile=$rowseller['email_id'];
	$email=$rowseller['mobile'];
	$business_name=$rowseller['Bussiness_name'];
	$business_url=$rowseller['Bussiness_url'];
	$product_type=$rowseller['Product_Type'];
	$brand=$rowseller['brand'];
	$cost=$rowseller['cost'];
	$address=$rowseller['city'].'-'.$rowseller['state'];
	$image=$rowseller['prodimg1'];
	$details=$business_name.'-'.$address.'<br>Product Type:'.$product_type.'-'.$brand.'<br>Email-id:'.$email.'<br>Business_url:'.$business_url.'<br>Contact Number:'.$mobile.'<br>cost of product:'.$cost;

$query2="insert into network (id,mobile,details,product_type,image) values('NULL','".mysqli_real_escape_string($con,$mobile)."','".mysqli_real_escape_string($con,$details)."','".mysqli_real_escape_string($con,$product_type)."','".mysqli_real_escape_string($con,$image)."')";
$run=mysqli_query($con,$query2);
if($run){
header('Location:network.php');
}
}


?>
