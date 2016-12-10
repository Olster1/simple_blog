<?php require_once("includes/session.php"); ?>
<?php require_once("includes/database_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php
	$message = null;
	if(isset($_GET["id"]))
	{
		$safe_id = mysqli_real_escape_string($db_handle, $_GET["id"]);
		$query = "DELETE FROM posts WHERE id = '{$safe_id}'";
		$query_result = mysqli_query($db_handle, $query);
		if($query_result && mysqli_affected_rows($db_handle) == 1)
		{
			$message = "post successfully deleted";
		}
		else
		{
			$message = "oops, something went wrong";
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
				<?php if(isset($message)) echo $message ?>
			</div>
			<div class="text">
				<?php
				$query = "SELECT * FROM posts";
				$query_result = mysqli_query($db_handle, $query);

				while($row = mysqli_fetch_assoc($query_result))
				{
					echo $row["creation_date"] . "<br>";
					echo $row["title"] . "<br>";
					$id = $row["id"];
					echo "<a href=\"edit_post.php?id={$id}\"> Edit Post</a>";
					echo "<br>";
					echo "<a href=\"manage_posts_edit_delete.php?id={$id}\"> Delete Post </a>";
					echo "<hr>";
				}
				?>
			</div>		
			
		</div>
	
	</div>
	<?php include("includes/footer.php"); ?>	


</body>