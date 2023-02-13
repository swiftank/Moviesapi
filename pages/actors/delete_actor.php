<?php
require_once '../../includes/config.php';
require_once '../../includes/database.php';
require_once '../../Actor.class.php';
include '../../header.php';

$actors  = new Actor;
echo 'All Actors';
$uid = empty( $_GET['uid']) ? NULL : $_GET['uid'];
$rows = $actors->deleteActor($uid);
