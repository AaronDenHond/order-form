<?php
//this line makes PHP behave in a more strict way
declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


//we are going to use session variables so we need to enable sessions
session_start();
//veel beter array met post inputs, dan forEach lopen (input array)

if(isset($_POST['email'])){

$email = $_POST['email'];
$street = $_POST['street'];
$streetNumber = $_POST['streetnumber'];
$city = $_POST['city'];
$zipcode = $_POST['zipcode'];

}
else {
    $email = $street = $streetNumber = $city = $zipcode ="";
}

//isset checken zodat op page load geen errors 

if (empty($email)) {
    $email_error = "Can't submit empty email.";
    unset($_SESSION["email"]);
    
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $email_filterError = "Invalid email format";
    unset($_SESSION["email"]);
} else {
    $_SESSION["email"] = $email;
}

if (empty($street)) {
    $street_error = "Can't submit empty adress.";
    
} else {
    $_SESSION["street"] = $street;
}

if (empty($streetNumber)) {
    $streetNumber_error = "Can't submit empty adress.";
    
} elseif (!is_numeric($streetNumber)) {
    $streetnumeric_error = 'Data entered was not numeric';
    unset($_SESSION["streetnumber"]);
} else {
    $_SESSION["streetnumber"] = $streetNumber;
}

if (empty($city)) {
    $city_error = "Can't submit empty city.";
    
} else {
    $_SESSION["city"] = $city;
}

if (empty($zipcode)) {
    $zipcode_error = "Can't submit empty zipcode.";
   
} elseif (!is_numeric($zipcode)) {
    $zipcodenum_error = "Data is not numeric";
    unset($_SESSION["zipcode"]);
} else {
    $_SESSION["zipcode"] = $zipcode;
}

function overView() {
    foreach($_POST as $key => $value) {
    echo  $key ." is ". $value ."<br>";
}
}



function whatIsHappening()
{
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



if($_SERVER['REQUEST_URI'] == '/order-form/index.php?food=1') {
    $products = [
        ['name' => 'Club Ham', 'price' => 3.20],
        ['name' => 'Club Cheese', 'price' => 3],
        ['name' => 'Club Cheese & Ham', 'price' => 4],
        ['name' => 'Club Chicken', 'price' => 4],
        ['name' => 'Club Salmon', 'price' => 5]
    ];
}
elseif($_SERVER['REQUEST_URI'] == '/order-form/index.php?food=0') {
    $products = [
        ['name' => 'Cola', 'price' => 2],
        ['name' => 'Fanta', 'price' => 2],
        ['name' => 'Sprite', 'price' => 2],
        ['name' => 'Ice-tea', 'price' => 3],
    ];
}


$totalValue = 0;

require 'form-view.php';
