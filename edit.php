<?php

//Connection to MySQL
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "";

$conn = new mysqli($servername, $username, $password, $dbname);

//alternative
//$conn = new mysqli("127.0.0.1", "root", "@Pudgeewarp02", "phpdemo");

//Check Connection
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM contacts WHERE id=$id");
$row = $result->fetch_assoc();

?>

<h2> Edit Contact </h2>

<form action="update.php" method="POST">
    <input type="hidden" name="id" value=" <?php echo $row['id']; ?>  ">
    Name: <input type="text" name="name" value=" <?php echo $row['name']; ?>  " required> <br><br>
    Email: <input type="email" name="email" value=" <?php echo $row['email']; ?>  " required> <br><br>
    <input type="submit" value="Update">
</form>

<a href="view.php"> Back to list </a>