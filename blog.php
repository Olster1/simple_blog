<?php require_once("includes/database_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>

<?php include("includes/head.php"); ?>

<body>
	<?php include("includes/header.php")?>
	<div class="main">
		<?php include("includes/navigation_bar.php"); ?>	

		<div class="text_container">
			<?php
				$sql_query = "SELECT * FROM posts ORDER BY creation_date DESC";
				$query_result = mysqli_query($db_handle, $sql_query);
				while($row = mysqli_fetch_assoc($query_result))
				{
					echo render_blog_post($row, true);
					echo "<hr style=\"border-top: dotted 1px;\">";
					
				}
				mysqli_free_result($query_result);
			?>
			
			
		</div>
	
	</div>
	<?php include("includes/footer.php"); ?>	


</body>