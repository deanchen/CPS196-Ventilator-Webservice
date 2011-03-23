<?php
header('Content-type: application/json');
if (isset($callback) && $callback != null) {
	echo $callback . "(" . json_encode($data) . ")";
} else {	
	echo json_encode($data);
}
?>