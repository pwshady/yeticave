<?php
//$is_auth = (bool) rand(0, 1);
require_once "functions.php";
require_once "lots.php";

$user_name = 'Константин';
$user_avatar = 'img/user.jpg';
//$page_content = "include " . "templates\index.php";





$cont = include_bloc ("templates/index.php", ["product_category" => $product_category, "product" => $product]);
print include_bloc("templates/layout.php", ["content" => $cont, "title" => "Home page"]);




?>

