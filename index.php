<?php
require_once ('villeRepo.php');

//$pdo=new VilleRepo();

$handle = fopen("villes.csv", "r");

$tabSelection=[]; // Tableau de ma selection de villes


//#########################
// Debut extraction
//#########################
    // CONNECTION BOURRIN
    try{
        $db = new PDO('mysql:host=localhost;dbname=projetDistance','root','');
    }
    catch (PDOException $e){
        die("Connection failed...");
    }
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($handle) {

    $nbl=0;
    while (($line = fgets($handle)) !== false) {
        if($nbl==0){
            $nbl=1; // ATTENTION ! nom des colonnes
            continue; // saute ton tour
        }

        $data = str_getcsv($line);

        // insertVille($db, $data);

        $nbl++;
    } //Fin du while
    fclose($handle);
    // Mon tableau est plein

//#########################
// Debut export
//#########################


    //*************** */
    // export csv
    // $fichierCSV="villesExtract.csv";
    // $handle = fopen($fichierCSV, "w");

    // foreach($tabSelection as $ligne){
    //     fputcsv($handle,$ligne);
    // }
    // fclose($handle);

    //*************** */
    // export json
    /*
    $fichierJSON="villesSavoie.json";
    $json = json_encode($tabSelection, JSON_PRETTY_PRINT);
    file_put_contents($fichierJSON, $json);
    */
}

// $cha = 'chamber';

// echo "<pre>";
// var_dump(getCityList($dbConnexion, $cha));


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<form autocomplete="off" action="./getDistanceVille.php" class="w-full">
  <div class="autocomplete w-5/6 flex mx-auto gap-2 pt-2" >
    <input id="firstCity" type="text" name="firstCity" placeholder=" Villes" class="rounded">
    <input id="secondCity" type="text" name="secondCity" placeholder=" Villes" class="rounded">
    <input type="submit" class="rounded py-1 px-2 hover:cursor-pointer">
</div>
</form>
    <script src="./js/script.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</body>
</html>