<?php
$mrSubmit = '';
$mrSubmitOut = '';

$mrNameInput = '';
$mrUsernameInput = '';
$mrEmailInput = '';
$mrStreetInput = '';
$mrCityInput = '';
$mrZipcodeInput = '';
$mrPhoneInput = '';
$mrCompanyInput = '';
$mrUsers = '';
$mrLastRecord = '';
$mrLastRecordId = '';

$mrValidateName = '';
$mrValidateUsername = '';
$mrValidateEmail = '';
$mrValidateStreet = '';
$mrValidateCity = '';
$mrValidateZipCode = '';
$mrValidatePhone = '';
$mrValidateCompany = '';
$mrValidateFlag = 0;

$mrSubmit = json_decode(trim(file_get_contents('php://input')), true);

$mrNameInput = $mrSubmit['mrNameInput'];
$mrUsernameInput = $mrSubmit['mrUsernameInput'];
$mrEmailInput = $mrSubmit['mrEmailInput'];
$mrStreetInput = $mrSubmit['mrStreetInput'];
$mrCityInput = $mrSubmit['mrCityInput'];
$mrZipcodeInput = $mrSubmit['mrZipcodeInput'];
$mrPhoneInput = $mrSubmit['mrPhoneInput'];
$mrCompanyInput = $mrSubmit['mrCompanyInput'];
$mrUsers = $mrSubmit['mrUsers'];

//Validation
if (empty($mrNameInput)) {
    $mrValidateFlag = 1;
    $mrValidateName = 'Required field';
}

if (empty($mrUsernameInput)) {
    $mrValidateFlag = 1;
    $mrValidateUsername = 'Required field';
}

if (empty($mrEmailInput)) {
    $mrValidateFlag = 1;
    $mrValidateEmail = 'Required field';
}else{
    if (!filter_var($mrEmailInput, FILTER_VALIDATE_EMAIL)) {
        $mrValidateFlag = 1;
        $mrValidateEmail = 'invalid email format';
    }
}

if (empty($mrStreetInput)) {
    $mrValidateFlag = 1;
    $mrValidateStreet = 'Required field';
}

if (empty($mrCityInput)) {
    $mrValidateFlag = 1;
    $mrValidateCity = 'Required field';
}

if (empty($mrZipcodeInput)) {
    $mrValidateFlag = 1;
    $mrValidateZipCode = 'Required field';
}

if (empty($mrPhoneInput)) {
    $mrValidateFlag = 1;
    $mrValidatePhone = 'Required field';
}

if (empty($mrCompanyInput)) {
    $mrValidateFlag = 1;
    $mrValidateCompany = 'Required field';
}


if ($mrValidateFlag == 0) {
//last ID
    $mrLastRecord = end($mrUsers);
    $mrLastRecordId = $mrLastRecord['id'];

// read json file
    $data = file_get_contents('../dataset/users.json');

// decode json
    $json_arr = json_decode($data, true);

// add data
    $json_arr[] = array('id' => $mrLastRecordId + 1, 'name' => $mrNameInput, 'username' => $mrUsernameInput, 'email' => $mrEmailInput,
        'address' => array('street' => $mrStreetInput, 'city' => $mrCityInput, 'zipcode' => $mrZipcodeInput),
        'phone' => $mrPhoneInput, 'company' => array('name' => $mrCompanyInput));

// encode json and save to file
    file_put_contents('../dataset/users.json', json_encode($json_arr));
}


$mrSubmitOut = [
    'mrNameInput' => $mrNameInput,
    'mrUsernameInput' => $mrUsernameInput,
    'mrEmailInput' => $mrEmailInput,
    'mrStreetInput' => $mrStreetInput,
    'mrCityInput' => $mrCityInput,
    'mrZipcodeInput' => $mrZipcodeInput,
    'mrPhoneInput' => $mrPhoneInput,
    'mrCompanyInput' => $mrCompanyInput,
    'mrUsers' => $mrUsers,
    'mrLastRecord' => $mrLastRecord,
    'mrLastRecordId' => $mrLastRecordId,

    'mrValidateFlag' => $mrValidateFlag,
    'mrValidateName' => $mrValidateName,
    'mrValidateUsername' => $mrValidateUsername,
    'mrValidateEmail' => $mrValidateEmail,
    'mrValidateStreet' => $mrValidateStreet,
    'mrValidateCity' => $mrValidateCity,
    'mrValidateZipCode' => $mrValidateZipCode,
    'mrValidatePhone' => $mrValidatePhone,
    'mrValidateCompany' => $mrValidateCompany,
];

echo json_encode($mrSubmitOut);
