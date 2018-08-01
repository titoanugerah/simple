<?php
require_once('config.php');
if($_SERVER['REQUEST_METHOD']=='GET') {
	$query = mysqli_query("SELECT A.* FROM ph AS A JOIN node AS B ON A.ph = B.id WHERE A.id");
	$array = array();
	foreach ($query as $result) {
		$row_array['id_node'] = $result->id_node;
		$row_array['record_time'] = $result->record_time;
		$row_array['ph'] = $result->ph;
		array_push($array, $row_array);
	}
	}
	echo json_encode('data'=>$array);
?>