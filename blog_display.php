<?php require_once("includes/database_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>

<?php
	if(isset($_POST["submit"]))
	{
		$safe_author = mysqli_real_escape_string($db_handle, trim($_POST["author"]));
		$safe_content = mysqli_real_escape_string($db_handle, trim($_POST["content"]));
		$safe_id = mysqli_real_escape_string($db_handle, $_GET["id"]);

		$sql_query = "INSERT INTO comments(author, content, blog_post_id) VALUES('{$safe_author}', '{$safe_content}', '{$safe_id}')";
		$sql_query_result = mysqli_query($db_handle, $sql_query); 
	}
?>

<?php include("includes/head.php"); ?>

<body>
	<?php include("includes/header.php")?>
	<div class="main">
		<?php include("includes/navigation_bar.php"); ?>	

		<div class="text_container">
			<?php
				$safe_id = mysqli_real_escape_string($db_handle, $_GET['id']);
				$sql_query = "SELECT * FROM posts WHERE id = '{$safe_id}' LIMIT 1";
				$query_result = mysqli_query($db_handle, $sql_query);
				while($row = mysqli_fetch_assoc($query_result))
				{
					echo render_blog_post($row, false);
										
				}
				mysqli_free_result($query_result);

				echo "<br>";
				$sql_query = "SELECT * FROM comments WHERE blog_post_id = '{$safe_id}'";
				$query_result = mysqli_query($db_handle, $sql_query);
				while($row = mysqli_fetch_assoc($query_result))
				{
					echo "<div class=\"text\">";
					echo "<div class=\"comment_title\">";
					echo $row["author"] . " says";
					echo "</div>";
					echo "<br>";
					echo $row["content"];
					echo "</div>";
					echo "<br>";
				}
			?>
			
			<hr>

			<div class="text">
				<form action="blog_display.php?id=<?php echo $safe_id;?>" method="POST">
					Name: <input type="text" name="author">
					<br>
					Comment: <textarea name="content"></textarea>
					<input type="submit" name="submit" value="Comment">
				</form>
			</div>
			
		</div>
	
	</div>
	<?php include("includes/footer.php"); ?>	


</body>