<?php
require_once '../../includes/config.php';
require_once '../../includes/database.php';
require_once '../../Actor.class.php';
include '../../header.php';
$movies  = new Actor;
echo 'All Actors';
$rows = $movies->fetchActors();
