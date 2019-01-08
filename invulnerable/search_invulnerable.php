<?php

if(isset($_POST['search'])){

$servername = "db";
$db_username = "user";
$db_password = "test";
$dbname = "myDb";;
	// Create connection
$conn = new mysqli($servername, $db_username, $db_password, $dbname);
	// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());

}
$sw=mysqli_real_escape_string($conn,$_POST['word']);
$result=mysqli_query($conn,"SELECT * FROM comments where postTitle like '%$sw%' or content like '%$sw%'");


while($row = $result->fetch_assoc())
{
echo '<div>';
                echo '<h1> POST ID: '.$row['postid'].'</h1>';
                echo '<p>Posted by '.$row['email'].'</p>';
                echo '<p>'.substr($row['content'],0,150).'</p>';                
                echo '<p><a href="viewpost_invulnerable.php?id='.$row['postid'].'">Read More</a></p>';                
echo '</div>';
}
}
?>
