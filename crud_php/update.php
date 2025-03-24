<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "go";
$con = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$n=$_GET['name'];
$q="SELECT * from employee where Name='$n'";
$result=$con->query($q);
while ($row=$result->fetch_assoc()){
  $name=$row['name'];
  $email = $row['Email']; 
  $message = $row['Message'];
  

}
if (isset($_POST['SEND'])) {
    $name = $_POST['name'];
    $email = $_POST['email']; 
    $message= $_POST['message'];
    // Update query
    $update = "UPDATE employee SET Name='$name', Email='$email', Message='$message' WHERE name='$name'";
    $result = $con->query($update);
header("location: /midi/show.php");
echo "Updated";
    
}
$con->close();
?>
 <form method="post"  action="">
<div class="container">
<h2>Contact Us</h2>
        <div class="input-field">
            <input type="text" id="name" name="name" placeholder="Name" value="<?php  echo $name?>">
             </div>
             <div class="input-field">
    <input type="email" id="email" name="email" placeholder="Email" value="<?php  echo $email?>" required>
    </div>
    <div class="input-field">
    <input type="text" id="message" name="message" placeholder="Message" value="<?php  echo $message?>" required>
   
    </div>
    <input type="submit" name="SEND" value="SEND">
    </div>
</form>
<div class="links"> 
    <ul>
    <li><a href="insert.php">insert</a></li>
    <li><a href="show.php">view</a></li>
    <li><a href="update.php">update</a></li>
    <li><a href="delete.php">delete</a></li> 
</ul>
</div>
</body>
</html>