<?php

$address = '127.0.0.1';
$address = '0.0.0.0';
$port = 10000;

$sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
socket_bind($sock, $address, $port);
socket_listen($sock, 5);


do {
    $msgsock = socket_accept($sock);

    $msg = "\n Welcome! \n";
    socket_write($msgsock, $msg, strlen($msg));

    $i=0;
    while ($i<10) {

        sleep(1);
        $in = "ECHO TEST {$i}";
        socket_write($msgsock, $in, strlen($in));
        // echo "$buf\n";
        $i++;
    }

    socket_close($msgsock);
} while (true);

socket_close($sock);
