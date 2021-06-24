<?php
//$is_auth = (bool) rand(0, 1);
require_once "functions.php";

$user_name = 'Константин';
$user_avatar = 'img/user.jpg';
//$page_content = "include " . "templates\index.php";

$product_category = array("Boards and skis", "Binding", "Boots", "Clothes", "Instruments", "Different");
$product = 
[
    ["product_name" => "2014 Rossignol District Snowboard", "category" => 0, "price" => 10999, "url_picture" => "lot-1.jpg"],
    ["product_name" => "DC Ply Mens 2016/2017 Snowboard", "category" => 0, "price" => 159999, "url_picture" => "lot-2.jpg"],
    ["product_name" => "binding Union Contact Pro 2015 year size L/XL", "category" => 1, "price" => 8000, "url_picture" => "lot-3.jpg"],
    ["product_name" => "Snowboards boots DC Mutiny Charocal", "category" => 2, "price" => 10999, "url_picture" => "lot-4.jpg"],
    ["product_name" => "Snowboards jacket DC Mutiny Charocal", "category" => 3, "price" => 7500, "url_picture" => "lot-5.jpg"],
    ["product_name" => "Mask Qakley Canopy", "category" => 5, "price" => 5400, "url_picture" => "lot-6.jpg"],
];

function format_price($price)
{
    $price = ceil($price);
    if ($price > 1000)
    {
        return substr($price, 0 , (strlen($price) - 3)) . " " . substr($price, (strlen($price) - 3), 3) . " ";
    }
    return $price . " ";
}

$cont = include_bloc ("templates/index.php", ["product_category" => $product_category, "product" => $product]);
print include_bloc("templates/layout.php", ["content" => $cont, "title" => "Home page"]);




?>

