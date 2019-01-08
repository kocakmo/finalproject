<?php ob_start(); ?>
<form action="" method="post">
<p><label>Username</label><input type="text" name="username" value=""  /></p>
<p><label>Password</label><input type="password" name="password" value=""  /></p>
<p><label></label><input type="submit" name="submit" value="Login"  /></p>
</form>
<?php
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
	
	
	
	
	$servername = "db";
	$db_username = "user";
	$db_password = "test";
	$dbname = "myDb";
		// Create connection
	$conn = new mysqli($servername, $db_username, $db_password, $dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());

	}
	$result=mysqli_query($conn,"SELECT * FROM users where username='$username' and password='$password'");
	if($result){
		header('Location: adminindex_vulnerable.php');
		exit;
	}else {
		echo '<p class="error">Wrong username or password</p>';
	}	
}
?>