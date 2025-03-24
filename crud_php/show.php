<!DOCTYPE html>
<html>
<head>
    <title>Contact Us</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        button {
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<h2>Contact Us</h2>

<table>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Message</th>
        <th>Action</th>
    </tr>
    <?php
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "go"; 
    $con = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
   

    $sql = "SELECT * FROM employee";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>" . $row["name"] . "</td>
                <td>" . $row["Email"] . "</td>
                <td>" . $row["Message"] . "</td>
                <td>
                <button> <a href='delete.php?name=$row[name]'>Delete</a> </button>
                <button> <a href='update.php?name=$row[name]'>Update</a> </button>
                </td>
            </tr>";
        }
        
       
    } else {
        echo "<tr><td colspan='11'>Somathing is wrong</td></tr>";
    }
    $con->close();
    ?>
</table>
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
