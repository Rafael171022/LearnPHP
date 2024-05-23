<?php 

if ($api == 'exe') {
    if ($method == "GET") {
        include_once "getExe.php";
    }
}

if ($api == 'versao') {
    if ($method == "GET") {
        include_once "getVersao.php";
    }
}
