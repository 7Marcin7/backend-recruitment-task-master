<?php
$mrMessage = '';
$mrFilename = '';
$mrDataJson = '';
$mrUsers = '';
$mrReadJsonOut = '';
$mrCountArray='';

if (file_exists('../dataset/users.json')) {
    $mrFilename = '../dataset/users.json';
    $mrDataJson = file_get_contents($mrFilename); //data read from json file
    $mrUsers = json_decode($mrDataJson);  //decode a data
    $mrMessage = "the file users.json exists";
} else {
    $mrMessage = "the file users.json not exists";
}

if (empty($mrUsers)) {
    $mrMessage = $mrMessage . ' and no records';
} else {
    $mrCountArray = count($mrUsers);
    if ($mrCountArray > 1) {
        $mrMessage = $mrMessage . ' and has ' . $mrCountArray . ' records';
    } else {
        $mrMessage = $mrMessage . ' and has ' . $mrCountArray . ' record';
    }

}

$mrReadJsonOut = [
    'mrMessage' => $mrMessage,
//    'mrDataJson' => $mrDataJson,
    'mrUsers' => $mrUsers

];

echo json_encode($mrReadJsonOut);