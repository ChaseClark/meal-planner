<?php 

DEFINE ('DB_USER', 'mp_user');
DEFINE ('DB_PASSWORD', 'secret123');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'meal_planner');

$db = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
 OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );

mysqli_set_charset($db, 'utf8');

?>