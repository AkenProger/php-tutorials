<?php
$name = $_POST['name'];
$price = $_POST['price'];
$manufacturer = $_POST['manufacturer'];

if (validateProductInput($name, $price, $manufacturer) == "success") {
    echo "Hello to system!";
} else {
    echo validateProductInput($name, $price, $manufacturer);
}


function validateProductInput($name, $price, $manufacturer): string
{
    if ($name == null) {
        return "name empty!";
    }
    if ($price < 0 | $price == null) {
        return "price error!";
    }
    if ($manufacturer == null) {
        return "Manufacturer error!";
    }
    return "success";
}

