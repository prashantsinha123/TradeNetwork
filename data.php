<?php
session_start();
include('include/db_connect.php');
$seller=$_SESSION['mobile'];

if(isset($_POST['product_type'])){
$product_type=$_POST['product_type'];
$query="select * from network where product_type='$product_type'";
$result=mysqli_query($con,$query);
$count=mysqli_num_rows($result);
$c=0;
while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){

$id=$row['id'];

$details=$row['details'];
$image=$row['image'];
$mobile=$row['mobile'];
$time=$row['timestamp'];
$query1="select * from login_net where mobile='$mobile'";
$res=mysqli_query($con,$query1);
$counting=mysqli_num_rows($res);
	$row=mysqli_fetch_array($res,MYSQLI_ASSOC);
	$user_id=$row['user_id'];
	$name=$row['name'];

	$query2="select * from seller where email_id='$mobile'";
	$res2=mysqli_query($con,$query2);
	$rows=mysqli_fetch_array($res2,MYSQLI_ASSOC);
	$user_id=$rows['id'];
	$namings=$rows['name'];

?>
<div class="product-sec1 ">
<div>
<?php if($counting>0){?>
<label> <?php echo $name;?></label><span style="float:right;font-size:12px"><?php echo time_ago_in_php($time);?></span> 

<?php }else{?>
<label> <?php echo $namings;?></label><span style="float:right;font-size:12px"><?php echo time_ago_in_php($time);?></span>
<?php }?>
</div>

<div style="word-wrap: break-word;font-size:13px">
<?php echo $details;?>
</div>
<div>
<?php if($counting>0){?>
	<img src="img/<?php echo $image;?>" style="width:100%;height:auto" class="responsive">
<?php }else{?>

		<img src="../images/<?php echo $image;?>" style="width:100%;height:auto" class="responsive">
<?php }?>
										<?php
$userid=$_SESSION['user_id'];
							$query1=mysqli_query($con,"select * from likes_comments where post_id='$id' and user_id='$userid'");
							if (mysqli_num_rows($query1)>0){
								?>
								<button style="font-size:13px" value="<?php echo $id; ?>" class="btn btn-primary unlike">Unlike</button>
								<?php
							}
							else{
								?>
								<button style="font-size:13px" value="<?php echo $id; ?>" class="btn btn-primary like">Like</button>
								<?php
							}
						?>
<button class=" btn btn-primary mycom" value="<?php echo $id;?>" style="float:right">comments</button>
					<div style="font-size:12px"><span id="show_like<?php echo $id; ?>">
						<?php
							$query3=mysqli_query($con,"select * from `likes_comments` where post_id='$id'");
							$count=mysqli_num_rows($query3);
							if($count>1){
							echo mysqli_num_rows($query3).' likes';
							}elseif($count==1){
							echo mysqli_num_rows($query3).' like';
							}
						?>
						</span></div>
					<div style="font-size:12px;float:right;margin-top:-16px"><span id="show_comment<?php echo $id; ?>">
						<?php
							$query4=mysqli_query($con,"select * from `comments` where post_id='$id'");
							$count4=mysqli_num_rows($query4);
							if($count4>1){
							echo mysqli_num_rows($query4).' comments';
							}elseif($count4==1){
							echo mysqli_num_rows($query4).' comment';
							}
						?>
						</span></div>
	</div>
</div>
<div class=" production " id="show<?php echo $id?>" style="display:none">

	<form method='post' onsubmit="return post(<?php echo $c;?>);">
		<input type="hidden" class="postid" value="<?php echo $id;?>">
		<input type="text" placeholder="Add a comment"  class="comment"  style="width:80%;font-size:13px;">
		<input type="submit" class="btn btn-default" value="post">
	</form>

<div id="display<?php echo $id;?>"  style="word-wrap:break-word"></div>
</div>
<?php
if ($c<=$count){
$c++;
}
}}
else{
$query="select * from network order by id DESC";
$result=mysqli_query($con,$query);
$count=mysqli_num_rows($result);
$c=0;
while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){

$id=$row['id'];

$details=$row['details'];
$image=$row['image'];
$mobile=$row['mobile'];
$time=$row['timestamp'];
$query1="select * from login_net where mobile='$mobile'";
$res=mysqli_query($con,$query1);
$counting=mysqli_num_rows($res);
	$row=mysqli_fetch_array($res,MYSQLI_ASSOC);
	$user_id=$row['user_id'];
	$name=$row['name'];

	$query2="select * from seller where email_id='$mobile'";
	$res2=mysqli_query($con,$query2);
	$rows=mysqli_fetch_array($res2,MYSQLI_ASSOC);
	$user_id=$rows['id'];
	$namings=$rows['name'];

?>
<div class="product-sec1 ">
<div>
<?php if($counting>0){?>
<label> <?php echo $name;?></label><span style="float:right;font-size:12px"><?php echo time_ago_in_php($time);?></span> 

<?php }else{?>
<label> <?php echo $namings;?></label><span style="float:right;font-size:12px"><?php echo time_ago_in_php($time);?></span>
<?php }?>
</div>

<div style="word-wrap: break-word;font-size:13px">
<?php echo $details;?>
</div>
<div>
<?php if($counting>0){?>
	<img src="img/<?php echo $image;?>" style="width:100%;height:auto" class="responsive">
<?php }else{?>

		<img src="../images/<?php echo $image;?>" style="width:100%;height:auto" class="responsive">
<?php }?>
										<?php
$userid=$_SESSION['user_id'];
							$query1=mysqli_query($con,"select * from likes_comments where post_id='$id' and user_id='$userid'");
							if (mysqli_num_rows($query1)>0){
								?>
								<button style="font-size:13px" value="<?php echo $id; ?>" class="btn btn-primary unlike">Unlike</button>
								<?php
							}
							else{
								?>
								<button style="font-size:13px" value="<?php echo $id; ?>" class="btn btn-primary like">Like</button>
								<?php
							}
						?>
<button class=" btn btn-primary mycom" value="<?php echo $id;?>" style="float:right">comments</button>
					<div style="font-size:12px"><span id="show_like<?php echo $id; ?>">
						<?php
							$query3=mysqli_query($con,"select * from `likes_comments` where post_id='$id'");
							$count=mysqli_num_rows($query3);
							if($count>1){
							echo mysqli_num_rows($query3).' likes';
							}elseif($count==1){
							echo mysqli_num_rows($query3).' like';
							}
						?>
						</span></div>
					<div style="font-size:12px;float:right;margin-top:-16px"><span id="show_comment<?php echo $id; ?>">
						<?php
							$query4=mysqli_query($con,"select * from `comments` where post_id='$id'");
							$count4=mysqli_num_rows($query4);
							if($count4>1){
							echo mysqli_num_rows($query4).' comments';
							}elseif($count4==1){
							echo mysqli_num_rows($query4).' comment';
							}
						?>
						</span></div>
</div>
</div>
<div class=" production " id="show<?php echo $id?>" style="display:none">

	<form method='post' onsubmit="return post(<?php echo $c;?>);">
		<input type="hidden" class="postid" value="<?php echo $id;?>">
		<input type="text" placeholder="Add a comment"  class="comment"  style="width:80%;font-size:13px;">
		<input type="submit" class="btn btn-default" value="post">
	</form>

<div id="display<?php echo $id;?>"  style="word-wrap:break-word"></div>
</div>
<?php
if ($c<=$count){
$c++;
}
}
}


?>

<?php
function time_ago_in_php($timestamp){
  
  $time_ago        = strtotime($timestamp);
  $current_time    = time();
  $time_difference = $current_time - $time_ago;
  $seconds         = $time_difference;
  
  $minutes = round($seconds / 60); // value 60 is seconds  
  $hours   = round($seconds / 3600); //value 3600 is 60 minutes * 60 sec  
  $days    = round($seconds / 86400); //86400 = 24 * 60 * 60;  
  $weeks   = round($seconds / 604800); // 7*24*60*60;  
  $months  = round($seconds / 2629440); //((365+365+365+365+366)/5/12)*24*60*60  
  $years   = round($seconds / 31553280); //(365+365+365+365+366)/5 * 24 * 60 * 60
                
  if ($seconds <= 60){

    return "Just Now";

  } else if ($minutes <= 60){

    if ($minutes == 1){

      return "one minute ago";

    } else {

      return "$minutes minutes ago";

    }

  } else if ($hours <= 24){

    if ($hours == 1){

      return "an hour ago";

    } else {

      return "$hours hrs ago";

    }

  } else if ($days <= 7){

    if ($days == 1){

      return "yesterday";

    } else {

      return "$days days ago";

    }

  } else if ($weeks <= 4.3){

    if ($weeks == 1){

      return "a week ago";

    } else {

      return "$weeks weeks ago";

    }

  } else if ($months <= 12){

    if ($months == 1){

      return "a month ago";

    } else {

      return "$months months ago";

    }

  } else {
    
    if ($years == 1){

      return "one year ago";

    } else {

      return "$years years ago";

    }
  }
}
?>







