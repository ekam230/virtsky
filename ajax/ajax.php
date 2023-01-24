<?php
// phpinfo(INFO_MODULES);
// echo('dsadsadas');
// if(!empty($_GET['query'])){
// 		$query = (string)$_GET['query'];
// 		$array = array();
// 		$request  = $db->query("SELECT `description`, `name` FROM `prefix_name` WHERE `description` LIKE '%". $db->real_escape_string($query) . "%' OR `name` LIKE '%". $db->real_escape_string($query) . "%' LIMIT 0, 10");
// 		while($data =$db->fetch_assoc($request)){
// 			$array[] = $data['name'];
// 		}

// 		echo "['".implode("','", $array)."']";
// 	}
// 	exit();


if(!empty($_GET['query'])){
	$name = $_GET['query'];

	 //Делаем первую букву большой
	 $char = mb_strtoupper(substr($name,0,2), "utf-8"); // это первый символ
	 $name[0] = $char[0];
	 $name[1] = $char[1];
	
	$db = new PDO('sqlite:test.db');

	$sql = "SELECT name,subject,lat,lon FROM `cityes` WHERE name LIKE '%$name%' LIMIT 5";

    $res = $db->prepare($sql);

    $res->execute();

	$array = array();

	// foreach($res as $row) {
	// 	echo $row['name'];
	// }

	foreach($res as $row) {
		$array[] = [$row['name'],$row['subject'],$row['lat'],$row['lon']];
		
	}
	//var_dump($array);
	//echo "['".implode("','", $array)."']";
	$json = json_encode($array, JSON_UNESCAPED_UNICODE);
	echo $json;
}
exit();