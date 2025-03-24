<?php
$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname="go";
$con = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
if($con->connect_error){
die("connection failed");
}
$name=$_GET['name'];
$query="delete from employee where name='$name'";
$con->query($query);
header("location: /midi/show.php ");
?>
