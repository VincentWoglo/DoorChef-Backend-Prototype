<?php
require('db_conn.php');
if (isset($_GET['search']) OR isset($_GET['search_input'])) {
	$query = $_GET['search_input'];
	if (empty($query)) {
		
	}else{
		$db = "SELECT * FROM prdocuts WHERE '$query' == TRUE";
	}
}
?>