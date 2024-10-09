<?php
include ('token.php');
ini_set("error_reporting", E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

define("TG_USER_ID", "831967222");
$getQuery = array(
    "url" => "https://nuteno.ru/",
);

$ch = curl_init("https://api.telegram.org/bot".TG_TOKEN . "/setWebhook?" .http_build_query($getQuery));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HEADER, false);

$resultQuery = curl_exec($ch);
curl_close($ch);

echo $resultQuery;



/*
$getQuery = array(
    "chat_id" => TG_USER_ID,
    "text" => "Сообщение с кнопками",
    "reply_markup" => json_encode(
        array(
            "inline_keyboard" => array(
                array(
                    array(
                        "text" => "button 1",
                        "callback_data" => "button1"
                    ),
                    array(
                        "text" => "button 2",
                        "callback_data" => "button2"
                    ),
                )
            ),
        )
    )
);

$ch = curl_init("https://api.telegram.org/bot".TG_TOKEN . "/sendMessage?" .http_build_query($getQuery));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HEADER, false);

$resultQuery = curl_exec($ch);
curl_close($ch);

echo $resultQuery;


//$data = file_get_contents("php://input");
//$data = json_decode($data, true);
/*
function writeLogFile($string, $clear = false) {
    $log_file_name = __DIR__."/message.txt";
    $now = date("Y-m-d H:i:s");
    if ($clear == false) {
        file_put_contents($log_file_name, $now . " " . print_r($string, true)."\r\n", FILE_APPEND);
    } else {
        file_put_contents($log_file_name,$now." ". print_r($string, true)."\r\n", FILE_APPEND);
    }
}

$data = file_get_contents("php://input");
$data = json_decode($data, true);
writeLogFile($data, true);
*/
//echo file_get_contents(__DIR__."/message.txt");
?>