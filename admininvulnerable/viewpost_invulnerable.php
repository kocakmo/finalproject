<?php		
		

			
			
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

$id=mysqli_real_escape_string($conn,$_GET['id']);

$result=mysqli_query($conn,"SELECT postid,email,content FROM comments WHERE postid ='$id'");

while($row = $result->fetch_assoc())
{
echo '<div>';
                echo '<h1> POST ID: '.$row['postid'].'</h1>';
                echo '<p>Posted by '.$row['email'].'</p>';
                echo '<p>'.$row['content'].'</p>';
echo '</div>';
}

?>