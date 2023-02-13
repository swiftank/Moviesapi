<?php
require_once '../../includes/config.php';
require_once '../../includes/database.php';
require_once '../../Actor.class.php';
include '../../header.php';

echo 'Add and Update Movie';
?>
 <br>
 <br>
 Note: You can change the actor name, dob and to update use uid in params <br><br>
  To Add Actor use  <code> ?name=New%20Actor%20Added&dob=1972-05-02</code>
  <br> To Update Actor use <code>name=New Updated Actor&dob=2022-05-02&uid=1</code>
<?php
$actors  = new Actor;
$data = [
    'name' => $_GET['name'],
    'dob' => $_GET['dob'],
];

$uid = empty( $_GET['uid']) ? NULL : $_GET['uid'];
$rows = $actors->addUpdateActors($data, $uid);

