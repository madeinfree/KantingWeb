<?php
/**************************************************
 *              連接用Function Query.php          *
 **************************************************/

/* Function db_connect
 * 
 */
class _Query {

	function db_connect() {
		include("config.php");
		return pg_connect("host=$host dbname=$dbname user=$user password=$password");
	}

	function db_close($close_link) {
		return pg_close($close_link);
	}

	function db_query($command) {
		return pg_query($command);
	}
	
	function db_fetch_row($query_result) {
		return pg_fetch_row($query_result);
	}

}


?>
