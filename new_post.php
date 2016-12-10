<?php require_once("includes/session.php"); ?>
<?php require_once("includes/database_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php
	if(isset($_POST["submit"]))
	{
		$title = trim($_POST["title"]);
		$content = trim($_POST["content"]);

		if(!empty($title) && !empty($content))
		{
			$safe_title = mysqli_real_escape_string($db_handle, $title);
			$safe_content = mysqli_real_escape_string($db_handle, $content);
			$query = "INSERT INTO posts (title, content) VALUES('{$safe_title}', '{$safe_content}')";
			$query_result = mysqli_query($db_handle, $query);

			if($query_result && mysqli_affected_rows($db_handle) == 1)
			{
				redirect_to("blog.php");
			}
		}

	}
?>

<?php include("includes/head.php"); ?>

<body>
	<?php include("includes/header.php"); ?>
	<div class="main">
		<?php include("includes/navigation_bar.php"); ?>	

		<div class="text_container">
			<div class="text">
				<form action="new_post.php" method="POST">
					<?php echo render_post_form(null, null, "Create"); ?>
				</form>
			</div>		
			
		</div>
	
	</div>
	<?php include("includes/footer.php"); ?>	


</body>