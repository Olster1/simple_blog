<?php require_once("includes/session.php"); ?>
<?php require_once("includes/database_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php

if(isset($_POST["submit"]))
{
	$username = trim($_POST["username"]);
	$password = trim($_POST["password"]);

	if(!empty($username) && !empty($password))
	{
		$safe_username = mysqli_real_escape_string($db_handle, $username);
		$safe_password = mysqli_real_escape_string($db_handle, $password);
		$query = "SELECT * FROM users WHERE username = '{$safe_username}' LIMIT 1";

		$query_result = mysqli_query($db_handle, $query);
		if($query_result && mysqli_affected_rows($db_handle) == 1)
		{
			$row = mysqli_fetch_assoc($query_result);
			
			
			if($row["hashed_password"] == $password)
			{
				$_SESSION["username"] = $username;
				$_SESSION["password"] = $password;
				redirect_to("manage_posts.php");
				
			}
		}
		mysqli_free_result($query_result);

	} 

}
?>

<?php include("includes/head.php"); ?>

<body>
	<?php include("includes/header.php")?>
	<div class="main">
		<?php include("includes/navigation_bar.php"); ?>	

		<div class="text_container">
			<div class="text">
				
				<form action="blog_login.php" method="POST">
					Username: <input type="text" name="username">
					<br>
					Password: <input type="password" name="password">
					<br>
					<br>
					<input type="submit" name="submit">
				</form>
			</div>
			
			
		</div>
	
	</div>
	<?php include("includes/footer.php"); ?>	


</body>