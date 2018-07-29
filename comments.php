<?php
include('include/db_connect.php');
if(isset($_POST['id'])){
$ids=$_POST['id'];
		$query2="select * from comments where post_id='$ids' order by id DESC";
		$res1=mysqli_query($con,$query2);
		while($row=mysqli_fetch_array($res1,MYSQLI_ASSOC)){
			$naming=$row['name'];
			$comment=$row['comment'];

		?>

		<label style="font-size:14px"><?php echo $naming;?></label>
		<div style="font-size:13px"><?php echo $comment;?></div>

<?php }}
if(isset($_POST['cid'])){
$cid=$_POST['cid'];
							$query4=mysqli_query($con,"select * from `comments` where post_id='$cid'");
							$count4=mysqli_num_rows($query4);
							if($count4>1){
							echo mysqli_num_rows($query4).' comments';
							}elseif($count4==1){
							echo mysqli_num_rows($query4).' comment';
							}
}

if(isset($_POST['lid'])){
$lid=$_POST['lid'];
			$query3=mysqli_query($con,"select * from `likes_comments` where post_id='$lid'");
							$count=mysqli_num_rows($query3);
							if($count>1){
							echo mysqli_num_rows($query3).' likes';
							}elseif($count==1){
							echo mysqli_num_rows($query3).' like';
							}
}
?>   






