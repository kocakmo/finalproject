<h1>Blog</h1>
<?php
$servername = "db";
$username = "user";
$password = "test";
$dbname = "myDb";
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
?>
<form method='post'>

    <p><label>Title</label><br />
    <input type='text' name='postTitle' </p>

    <p><label>Description</label><br />
    <textarea name='postDesc' cols='60' rows='10'></textarea></p>

    <p><label>Content</label><br />
    <textarea name='postCont' cols='60' rows='10'></textarea></p>

    <p><input type='submit' name='submit' value='Submit'></p>

</form>


<p><a href="view_vulnerable.php">View and add posts</a></p>

<?php
//if form has been submitted process it
if(isset($_POST['submit'])){

	$title=$_POST['postTitle'];
	$description=$_POST['postDesc'];
	$content=$_POST['postCont'];
	$sql = "INSERT INTO comments (postTitle, email, content) VALUES ('$title', '$description', '$content')";

	if (mysqli_query($conn, $sql)) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}