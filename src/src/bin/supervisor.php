<?php

$i = 1;

while (true) {
    file_put_contents('message.log', 'Hello '.++$i.PHP_EOL, FILE_APPEND);

    sleep(3);
}
