<?php

$input = file_get_contents("php://input");
$update = json_decode($input, TRUE);

$chat_id = $update["message"]["chat"]["id"];
$text = strtolower($update["message"]["text"]);


$respuesta = "No entiendo la pregunta.";

if (strpos($text, "carne") !== false || strpos($text, "queso") !== false || strpos($text, "jamon") !== false) {
    $respuesta = "Pasillo 1";
} elseif (strpos($text, "leche") !== false || strpos($text, "yogurth") !== false || strpos($text, "cereal") !== false) {
    $respuesta = "Pasillo 2";
} elseif (strpos($text, "bebidas") !== false || strpos($text, "jugos") !== false) {
    $respuesta = "Pasillo 3";
} elseif (strpos($text, "pan") !== false || strpos($text, "pasteles") !== false || strpos($text, "tortas") !== false) {
    $respuesta = "Pasillo 4";
} elseif (strpos($text, "detergente") !== false || strpos($text, "lavaloza") !== false) {
    $respuesta = "Pasillo 5";
}

$token = "8546618332:AAE18o3MY3A02xxZ8xAtt4E5LxrotoXuVnM";

$url = "https://api.telegram.org/bot$token/sendMessage";

file_get_contents($url . "?chat_id=$chat_id&text=" . urlencode($respuesta));

?>
