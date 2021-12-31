<?php
function sio_message($message, $data) {
    $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
    $result = socket_connect($socket, '127.0.0.1', 3000);
    if(!$result) {

        die('cannot connect '.socket_strerror(socket_last_error()).PHP_EOL);

    }
    $bytes = socket_write($socket, json_encode(Array("msg" => $message, "data" => $data)),strlen(json_encode(Array("msg" => $message, "data" => $data))));

    socket_close($socket);
}
?>