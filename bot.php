<<?php

$input = file_get_contents("php://input");
$update = json_decode($input, true);

if (!$update || !isset($update["message"]["chat"]["id"]) || !isset($update["message"]["text"])) {
    http_response_code(200);
    exit("OK");
}

$chat_id = $update["message"]["chat"]["id"];
$text = mb_strtolower(trim($update["message"]["text"]), "UTF-8");

$respuesta = "Lo siento, no entiendo la pregunta. Intenta consultar por un producto del supermercado.";

if (strpos($text, "carne") !== false || strpos($text, "queso") !== false || strpos($text, "jamon") !== false || strpos($text, "jamón") !== false) {
    $respuesta = "El producto se encuentra en el Pasillo 1.";
}

elseif (strpos($text, "leche") !== false || strpos($text, "yogur") !== false || strpos($text, "yogurth") !== false || strpos($text, "cereal") !== false) {
    $respuesta = "El producto se encuentra en el Pasillo 2.";
}

elseif (strpos($text, "bebida") !== false || strpos($text, "bebidas") !== false || strpos($text, "jugo") !== false || strpos($text, "jugos") !== false) {
    $respuesta = "El producto se encuentra en el Pasillo 3.";
}

elseif (strpos($text, "pan") !== false || strpos($text, "pastel") !== false || strpos($text, "pasteles") !== false || strpos($text, "torta") !== false || strpos($text, "tortas") !== false) {
    $respuesta = "El producto se encuentra en el Pasillo 4.";
}

elseif (strpos($text, "detergente") !== false || strpos($text, "lavaloza") !== false) {
    $respuesta = "El producto se encuentra en el Pasillo 5.";
}

$token = "8712740319:AAGaF2-I3Xy5BnDy4OuCwSXiRiD5rm7v2jw";
$url = "https://api.telegram.org/bot{$token}/sendMessage";

file_get_contents($url . "?" . http_build_query([
    "chat_id" => $chat_id,
    "text" => $respuesta
]));

http_response_code(200);
echo "OK";

?>
    
