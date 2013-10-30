<?php

function db_connect() {
	include("config.php");
	return pg_connect("host=$host dbname=$dbname user=$user password=$password");
}

function db_query($command) {
	return pg_query($command);
}


?>