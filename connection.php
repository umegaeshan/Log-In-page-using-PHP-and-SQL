<?php


$connection = mysqli_connect('localhost','root','','project1-users');

if(mysqli_connect_errno()){
	die("database connection failed ". mysqli_connect_error());
}

?>