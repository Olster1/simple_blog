<?php 

function redirect_to($location)
{
	header('Location: ' . $location);
	exit;
}

function render_blog_post($row, $add_links)
{
	$output = "<div class='text'>";
		$output .= "<div class='title'>";
			if($add_links)
			{
				$output .= "<a href=\"blog_display.php?id=". $row['id'] . "\">";
			}

			$output .= $row["title"];

			if($add_links)
			{
				$output .= "</a>";
			}
		$output .= "</div>";
	$output .= "<br>";
	$output .= "<div class='text'>";
		$output .= "<img src=\"images/clock.png\" style=\"float: left; width: 4%;\">";
		$output .= $row["creation_date"];
	$output .= "</div>";
	$output .= "<br>";
	$output .= "<br>";
	$output .= $row["content"];
	$output .= "</div>";

	return $output;
}

function render_post_form($title, $content, $submit_text)
{
	$output = "Title: ";
	$output .= "<br>";
	$output .= "<input type=\"text\" name=\"title\" value=\"{$title}\">";
	$output .= "<br>";
	$output .= "Content: ";
	$output .= "<br>";
	$output .= "<textarea name=\"content\"> {$content} </textarea>";
	$output .= "<br>";
	$output .= "<br>";
	$output .= "<input type=\"submit\" name=\"submit\" value=\"{$submit_text}\">";

	return $output;
}


?>