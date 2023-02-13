
<?php 
 $url = 'http://localhost/phptask/';
?>
<h1 style='text-align:center'>Movies Api App</h1>
<hr>
<p style='text-align:center'>
	<a href="<?php echo $url; ?>pages/movies/movies.php">All Movies</a>&nbsp;&nbsp;&nbsp;
	<a href="<?php echo $url; ?>pages/movies/fetch_movies_with_actors.php">All Movies with Actors</a>&nbsp;&nbsp;&nbsp;
	<a href="<?php echo $url; ?>pages/movies/fetch_movies_actors.php">All Actors with Movies age desc</a>&nbsp;&nbsp;&nbsp;
	<a href="<?php echo $url; ?>pages/movies/single_movie.php?movies[]=1">Movies by Ids</a>&nbsp;&nbsp;&nbsp;
    <a href="<?php echo $url; ?>pages/movies/add_movie.php?title=New Movie Added&runtime=124&release_date=2023-2-28">Add Movie</a>&nbsp;&nbsp;&nbsp;
	<a href="<?php echo $url; ?>pages/movies/add_movie.php?title=New Movie Added&runtime=124&release_date=2023-2-28&uid=4">Update Movie</a>&nbsp;&nbsp;&nbsp;
	<a href="<?php echo $url; ?>pages/movies/delete_movie.php?uid=4">Delete Movie</a>&nbsp;&nbsp;&nbsp;


	<br><br>
	<a href="<?php echo $url; ?>pages/actors/actors.php">All Actors</a>&nbsp;&nbsp;&nbsp;
    <a href="<?php echo $url; ?>pages/actors/single_actor.php?actors[]=1">Actors by Ids</a>&nbsp;&nbsp;&nbsp;
	<a href="<?php echo $url; ?>pages/actors/add_actor.php?name=New Actor Added&dob=1972-05-02">Add Actor</a>&nbsp;&nbsp;&nbsp;
    <a href="<?php echo $url; ?>pages/actors/add_actor.php?name=Updated Actor Name&dob=2023-05-02&uid=4">Update Actor</a>&nbsp;&nbsp;&nbsp;
	<a href="<?php echo $url; ?>pages/actors/delete_actor.php?uid=4">Delete Actor</a>&nbsp;&nbsp;&nbsp;

</p>