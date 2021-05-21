<?php
//this line makes PHP behave in a more strict way
declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


//we are going to use session variables so we need to enable sessions
session_start();

$email = $_POST['email'];
$street = $_POST['street'];
$streetNumber = $_POST['streetnumber'];
$city = $_POST['city'];
$zipcode = $_POST['zipcode'];

if(empty($email)) {
    $email_error = "Please insert a valid email-adress";
}
elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
 $email_filterError = "Invalid email format";
}
else {
    $_SESSION["email"] = $email;
}
if(empty($street)) {
    $street_error = "Please insert a valid street adress";
}
if(empty($streetNumber)){
    $streetNumber_error = "Please insert a valid street number";
}
if(empty($city)) {
    $city_error = "Please insert a valid city name";
}
if(empty($zipcode)){
    $zipcode_error = "Please insert a valid zipcode";
}
function whatIsHappening() {
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
}





//your products with their price.
$products = [
    ['name' => 'Club Ham', 'price' => 3.20],
    ['name' => 'Club Cheese', 'price' => 3],
    ['name' => 'Club Cheese & Ham', 'price' => 4],
    ['name' => 'Club Chicken', 'price' => 4],
    ['name' => 'Club Salmon', 'price' => 5]
];

$products = [
    ['name' => 'Cola', 'price' => 2],
    ['name' => 'Fanta', 'price' => 2],
    ['name' => 'Sprite', 'price' => 2],
    ['name' => 'Ice-tea', 'price' => 3],
];

$totalValue = 0;

require 'form-view.php';

