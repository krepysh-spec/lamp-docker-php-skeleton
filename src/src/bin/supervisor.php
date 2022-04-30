<?php

$i = 1;

while (true) {
    file_put_contents('supervisor-debug.log', 'Hello '.++$i.PHP_EOL, FILE_APPEND);

    sleep(5);
}
