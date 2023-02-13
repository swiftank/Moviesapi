<?php
require_once '../../includes/config.php';
require_once '../../includes/database.php';
require_once '../../Movie.class.php';
include '../../header.php';

echo 'Add and Update Movie';
?>
 <br>
 <br>
 Note: You can change the movie title, release_date, runtime and to update use uid in params <br><br>
  To Add Movie use  <code> ?title=New_Movie_Added&runtime=124&release_date=2023-2-28</code>
  <br> To Update Movie use <code>?title=New_Movie_Added&runtime=124&release_date=2023-2-28&uid=1</code>
<?php
$movies  = new Movie;
$data = [
    'title' => $_GET['title'],
    'runtime' => $_GET['runtime'],
    'release_date' => $_GET['release_date'],
];

$uid = empty( $_GET['uid']) ? NULL : $_GET['uid'];
$rows = $movies->addUpdateMovies($data, $uid);

