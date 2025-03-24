<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Form</title>
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
if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message= $_POST['message'];

    $insertQuery = "INSERT INTO employee (name, Email, Message) VALUES ('$name', '$email', '$message')";

    if ($con->query($insertQuery) === TRUE) {
        echo "Data Inserted successfully";
    } else {
        echo "Error: " . $insertQuery . "<br>" . $con->error;
    }
}
$con->close();
?>

<form method="post"  action="">
<div class="container">
<h2>Contact Us</h2>
        <div class="input-field">
            <input type="text" id="name" name="name" placeholder="Name" value="">
             </div>
             <div class="input-field">
    <input type="email" id="email" name="email" placeholder="Email" value="" required>
    </div>
    <div class="input-field">
    <textarea id="message" name="message" placeholder="Message..." value=""></textarea>
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