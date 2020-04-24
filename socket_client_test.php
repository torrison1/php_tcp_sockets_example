<?php

error_reporting(E_ALL);

$address = '127.0.0.1';
$service_port = 10000;

$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

$result = socket_connect($socket, $address, $service_port);

$data = 'TEST TEST';

if (socket_write($socket, $data, strlen($data))) {
    echo "Write - OK!"."\r\n";;
};

$i=0;
while ($i<10) {
    sleep(1);
    echo "=====================\r\n";

    socket_set_nonblock($socket);

    echo "========== Read Start =======\r\n";
    $out = socket_read($socket, 1024 );
    echo "========== Read OK =======\r\n";
    $res = ($out);
    echo 'Response:'.$res."\r\n";
    echo "=====================\r\n";
    $i++;
}

echo "Closing socket...";
socket_close($socket);
echo "OK.\n\n";