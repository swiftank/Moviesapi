<?php
require_once '../../includes/config.php';
require_once '../../includes/database.php';
require_once '../../Actor.class.php';
include '../../header.php';

echo 'Actor By Ids';
?>
 <br>
 <br>
 Note: To fetch multiple actors by uids add <code> ?actors[]=1,2,3</code> in actors parameters
<?php
$actors  = new Actor;
$rows = $actors->fetchActorsByIds($_GET['actors']);

