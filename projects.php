<?php include("includes/head.php"); ?>

<body>
	<?php include("includes/header.php")?>
	<div class="main">
		<?php include("includes/navigation_bar.php"); ?>	

		<div class="text_container">
			<div class="text">
				I wanted to make a website about practicing to code. Put up some simple projects that can help get you coding and solving problems on your own, because thats where the fun is.
				<br>
				<hr>
				The first project I'm putting up is the "Game of Life" made or discovered by the mathematician John Conway. It is a cellular automaton simulation using four rules to create its diverse behaviour. What I found interesting is if you change one of these three rules slighlty, like dying if there is less than _three_ not _two_ neighbours, no structure arises. It has been shown to be turing complete, able to simulate anything that can be represented algorithmically. When watching the simulation, it does seem that there is something deep about it; that is does describe some universal truth.
				<br>
				<br>
				I found making the extra GUI fun, like the slider bar and text box for people to enter the grid size. I just used an array to store the cell value and modified a copied version on each click of the automaton world. I did this so there wasn't a biase on who was updated first.<br>
				<br>
				There are really big simulations on the internet and there are alot of optimizations people have done. I think to add more to the simulation I've put up here, I could try putting multiple sections on different threads, as well if we could make the world inifine, where the user can keep scrolling out. Anyway, it was a cool learning project. It also got me interested in reading more about computation.
				<br>
				<br>
				<a href="apps/Conways game of life.jar"> Conway's game of life</a>
			
				<br>
				<hr>
				This project was to explore maze generation algorithms. I wanted to try and work through the problem without looking at the solutions on wikipedia. The algorithm I used first was the maze starts empty then at each cell, there will be a probability of putting up a wall. However I soon discovered that in order to avoid unreachable regions, whenever a wall was going to be added, it had to be sure that the current cell could still be reached, and to do this floodfill was used, first recursively than non-recursively(I had to look at a solution for non-recusive flood fill). The problem I ran into was that since it was gernerated from top to bottom, the bottom row would be mostly open. I ended up using Prim's alogrithm for the app, which works much better.
				<br>
				<br>
				<a href="apps/MazeRunner.jar"> Random Maze Generation</a>
				
			</div>		
			
			
		</div>
	
	</div>
	<?php include("includes/footer.php"); ?>	


</body>