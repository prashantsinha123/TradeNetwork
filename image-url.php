<?php
ini_set('display_errors', 'On');
error_reporting(-1);
//error_reporting(0);

require_once("Way2enjoyweb.php");

// database connection starts here   
date_default_timezone_set("Asia/Kolkata"); 
include('/home/comumlay/public_html/network/connecti.php');
mysqli_set_charset($con, 'utf8mb4');
$table_to_optimize=array("rice","oils"); // this to be edited later for network tables
$random_table = $table_to_optimize[array_rand($table_to_optimize, 1)];
$re991 = mysqli_query($con,"select id,status,prod_img from $random_table where status='0' order by id desc limit 1");
$row2 = mysqli_fetch_assoc($re991);
$status=$row2['status'];
$iddd=$row2['id'];
$imglink=$row2['prod_img'];

$imglink_absolute='http://www.comumart.com/images/'.$row2['prod_img'];



echo $imglink_absolute;
$image_path='/home/comumlay/public_html/images/'.$imglink;
// database connection ends here

$Way2web = new Way2enjoyweb("support@comumart.com", "comumart");

$params = array(
    "url" => $imglink_absolute,
    "wait" => true,
//varies from 32-320//    "mp3_bit" => "96",
//varies from 1-100//    "quality" => "95",
	"resize" => array(
        "width" => 1000,
//        "height" => 75,
//        "strategy" => "crop"
 ),
);

$data = $Way2web->url($params);
//echo $params["url"];
//var_dump($url);

if (!empty($data["success"])) {

	// optimization succeeded
	echo "Success. Optimized image URL: " . $data["compressed_url"];


	
copy($data["compressed_url"], $image_path);
	
	mysqli_query($con,"update $random_table set status='1' where id='$iddd' ");	


} elseif (isset($data["message"])) {

	// something went wrong with the optimization
	echo "Optimization failed. Error message from Way2enjoy.com: " . $data["message"];
} else {

	// something went wrong with the request
	echo "cURL request failed. Error message: " . $data["error"];
}