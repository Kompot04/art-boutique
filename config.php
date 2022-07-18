<?php
$conn=new mysqli("localhost", "root", "root", "shop");
if($conn->connect_error){
	die("Connect Failed".$conn->connect_error);
}
?>