<?php require_once("includes/session.php"); ?>
<?php require_once("includes/database_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php
	$post = null;
	$id = null;
	if(isset($_GET["id"]))
	{
		$id = $_GET["id"];
		if(isset($_POST["submit"]))
		{
			$safe_title = mysqli_real_escape_string($db_handle, trim($_POST["title"]));
			$safe_content = mysqli_real_escape_string($db_handle, trim($_POST["content"]));

			$query = "UPDATE posts SET title='{$safe_title}', content='{$safe_content}' WHERE id = '{$id}'";
			$query_result = mysqli_query($db_handle, $query);
			if($query_result)
			{
				redirect_to("manage_posts_edit_delete.php");
			}
			else
			{
				redirect_to("index.php");	
			}
		}


		$safe_id = mysqli_real_escape_string($db_handle, $_GET["id"]);
		$query = "SELECT * FROM posts where id = $safe_id";
		$query_result = mysqli_query($db_handle, $query);
		if($query_result && mysqli_affected_rows($db_handle) == 1)
		{
			$post = mysqli_fetch_assoc($query_result);	
		}
	}
	else
	{
		redirect_to("manage_posts_edit_delete.php");
	}

?>

<?php include("includes/head.php"); ?>

<body>
	<?php include("includes/header.php"); ?>
	<div class="main">
		<?php include("includes/navigation_bar.php"); ?>	

		<div class="text_container">
			<div class="text">
				
				<form action="edit_post.php?id=<?php echo $id; ?>" method="POST">
					<?php echo render_post_form($post["title"], $post["content"], "Update"); ?>
				</form>
			</div>		
			
		</div>
	
	</div>
	<?php include("includes/footer.php"); ?>	


</body>