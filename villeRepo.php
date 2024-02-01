<?php

$driver = 'mysql';
$config = http_build_query(data:[
    'host' => 'localhost',
    'port' =>  '3306',
    'dbname' => 'projetDistance'
], arg_separator:';');

$dsn = "{$driver}:{$config}";
$username= 'root';
$password = '';

$dbConnexion = new PDO ($dsn, $username, $password);

function insertVille($db,$data){
    /*
            $stmt->bindValue( 'VL_nom' , $data[0]);
            $stmt->bindValue( 'VL_cpostal' , $data[1]);
            $stmt->bindValue( 'VL_lat' , $data[2]);
            $stmt->bindValue( 'VL_lng' , $data[3]);
            $stmt->bindValue( 'VL_alt' , $data[4]);
        */

        
        // $tmp=[];
        // $tmp["Nom"]=utf8_decode($data[1]); // joie des encodages
        // $tmp["CodeP"]=$data[10];
        // $tmp["DepNom"]=$data[3];
        // $tmp["DepNum"]=$data[4];
        // $tmp["Lat"]=$data[14];
        // $tmp["Lng"]=$data[15];
        // $tmp["Alt"]=$data[12]; // Enlever le "m" ?


        // $tmp=[];
        // $tmp["VL_id"]=$nbl; 
        // $tmp["VL_nom"]=$data[1]; // joie des encodages
        // $tmp["VL_cpostal"]=$data[10];
        // $tmp["VL_depNom"]=$data[3];
        // $tmp["VL_depNum"]=$data[4];
        // $tmp["VL_lat"]=$data[14];
        // $tmp["VL_lng"]=$data[15];
        // $tmp["VL_alt"]=$data[12]; // Enlever le "m" ?
        // array_push($tabSelection,$tmp);
    
    $query="INSERT INTO villes(VL_nom,VL_cpostal,VL_depNom,VL_depNum,VL_lat,VL_lng,VL_alt) 
        VALUES(:VL_nom,:VL_cpostal,:VL_depNom,:VL_depNum,:VL_lat,:VL_lng,:VL_alt)";

    $stmt=$db->prepare($query);

    $stmt->bindValue( 'VL_nom' , $data[1]);
    $stmt->bindValue( 'VL_cpostal' , $data[10]);
    $stmt->bindValue( 'VL_depNom' , $data[3]);
    $stmt->bindValue( 'VL_depNum' , $data[4]);
    $stmt->bindValue( 'VL_lat' , $data[14]);
    $stmt->bindValue( 'VL_lng' , $data[15]);
    $stmt->bindValue( 'VL_alt' , $data[12]);

    $stmt->execute();
}

function getCityList($dbConnexion, $inputLetter){

    $result =[];

    $query = "SELECT VL_ID, VL_nom, VL_cpostal
    FROM villes
    WHERE VL_Nom LIKE '{$inputLetter}%' LIMIT 0, 10 ";

$stmt = $dbConnexion->query($query);

// Vérifie si la requête a réussi
if ($stmt) {
    // Récupère les résultats sous forme de tableau associatif
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    // Gère l'erreur si la requête échoue
    echo "Erreur lors de l'exécution de la requête.";
}



return $result;
}