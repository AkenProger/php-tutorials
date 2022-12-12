<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once "../config/Database.php";
include_once "../objects/Product.php";

$database = new Database();
$db = $database->getConnection();

$product = new Product($db);

$dataFromRequest = json_decode(file_get_contents("php://input"));

$product->id = $dataFromRequest->id;

$product->name = $dataFromRequest->name;
$product->price = $dataFromRequest->price;
$product->description = $dataFromRequest->description;
$product->category_id = $dataFromRequest->category_id;
$product->img = $dataFromRequest->img;

if ($product->update()) {
    http_response_code(200);
    echo json_encode(array("message" => "Товар был обновлен."), JSON_UNESCAPED_UNICODE);
}else {
    http_response_code(503);
    echo json_encode(array("message" => "Невозможно обновить товар"), JSON_UNESCAPED_UNICODE);
}
