<?php

$messages = parse_ini_file("data/rus.messages");

function getMessage($id) {
    $val = $GLOBALS["messages"][$id];
    if (runLocally()) {
        $valConverted = mb_convert_encoding($val, "windows-1251", "utf-8");
        return $valConverted;
    } else {

    }
    return $val;
}


function runLocally() {
    $whitelist = array(
        '127.0.0.1',
        '::1'
    );

    if (in_array($_SERVER['REMOTE_ADDR'], $whitelist)) {
        return true;
    } else {
        return false;
    }
}
//getMessage('welcome_0');

?>