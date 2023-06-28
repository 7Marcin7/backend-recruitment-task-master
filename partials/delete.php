<?php
$mrDelete='';
$mrId='';
$mrDeleteOut='';

$mrDelete = json_decode(trim(file_get_contents('php://input')), true);


$mrId = $mrDelete['mrId'];

// read json file
$data = file_get_contents('../dataset/users.json');

// decode json to associative array
$json_arr = json_decode($data, true);

// get array index to delete
$arr_index = array();
foreach ($json_arr as $key => $value)
{
    if ($value['id'] == $mrId)
    {
        $arr_index[] = $key;
    }
}

// delete data
foreach ($arr_index as $i)
{
    unset($json_arr[$i]);
}

// rebase array
$json_arr = array_values($json_arr);

// encode array to json and save to file
file_put_contents('../dataset/users.json', json_encode($json_arr));


$mrDeleteOut = [
    'mrId' => $mrId,

];

echo json_encode($mrDeleteOut);
