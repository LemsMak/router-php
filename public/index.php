<?php

session_start();

require "../app/core/init.php";

//CAPTURER LE LIEN APRES LOCALHOST ET LE METTRE DANS LA VARIABLE GET[]

function funct()
{
    if (isset($_GET['url'])) {
        $URL = strtolower($_GET['url']);

        $urlTransform = explode("/", $URL);
        return $urlTransform;
    } else {
        $URL = 'home';

        $urlTransform = explode("/", $URL);
        return $urlTransform;
    }
}


function separer()
{
    $SEPARER = funct();

    $FILENAME = "../app/controllers/$SEPARER[0]" . ".php";

    if (file_exists($FILENAME)) {
        require $FILENAME;
    } else {
        $FILENAME = "../app/controllers/404.php";
        require $FILENAME;
    }
}

separer();
