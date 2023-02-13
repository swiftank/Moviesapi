<?php
require_once '../../includes/config.php';
require_once '../../includes/database.php';
require_once '../../Movie.class.php';
include '../../header.php';

echo 'Movie By Ids';
?>
 <br>
 <br>
 Note: To fetch multiple movies by uids add <code> ?movies[]=1,2,3</code> in movies parameters
<?php
$movies  = new Movie;
$rows = $movies->fetchMoviesByIds($_GET['movies']);

