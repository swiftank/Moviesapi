<?php
require_once '../../includes/config.php';
require_once '../../includes/database.php';
require_once '../../Movie.class.php';
include '../../header.php';

$movies  = new Movie;
echo 'All Movies';
$rows = $movies->fetchMovies();
