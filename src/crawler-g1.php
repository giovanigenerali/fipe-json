<?php
function getVehicles($vehicles) {
	global $api;
	foreach ($vehicles as $vehicle) {
		$json_file = $vehicle.".json";
		$json_url = $api . $json_file;
		exec("curl $json_url -o $json_file");
		exec("mkdir $vehicle");
		getModels($vehicle);
	}
}
function getModels($vehicle) {
	global $api;
	$file = file_get_contents($vehicle.".json");
	$fipe_codes = json_decode($file, true);
	foreach ($fipe_codes as $code) {
		$json_file = $vehicle ."/". $code['cod_fipe'] .".json";
		$json_url = $api . $json_file;
		exec("curl $json_url -o $json_file");
	}
}

global $api;
$api = "http://g1.globo.com/static/fipe/json/";
getVehicles(["caminhao", "moto", "carro"]);

# run: php crawler-g1.php