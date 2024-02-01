<?php

header('Content-Type: application/json');

require_once ('villeRepo.php');


// $inputLetter = $_POST['myCountry'];


//var_dump($_REQUEST);

//$inputLetter = 'chamber';


$inputLetter = $_REQUEST['search'];


$result = getCityList($dbConnexion, $inputLetter);

$data['LISTE'] = $result;
$json = json_encode($data);


echo $json;

// echo 'salut';