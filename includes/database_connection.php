<?php 
	// DEFINE("DB_SERVER", "localhost");
	// DEFINE("DB_USER", "oliver");
	// DEFINE("DB_PASSWORD", "p");
	// DEFINE("DB_NAME", "personal_blog");

	DEFINE("DB_SERVER", "mysql-1.profound.net.au");
	DEFINE("DB_USER", "oliverm-43");
	DEFINE("DB_PASSWORD", "7BfcKyCEo4fBu0u5j");
	DEFINE("DB_NAME", "olivermco");


	$db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);

	if(!$db_handle)
	{
		exit("Could not connect to database" . mysqli_connect_error());
	}
?>