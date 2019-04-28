<?php

class uitvaartcentraController
{

    //construct
    function __construct()
    { }

    function getUitvaartcentras()
    {
        $uitvaartcentra = new uitvaartcentraModel();
        $uitvaartcentras = $uitvaartcentra->getAllUitvaartcentras();

        return $uitvaartcentras;
    }

    function insertNewUitvaartcentra($name, $street, $houseNumber, $city, $can_deliver, $comment)
    {
        $num = 0;

        if ($can_deliver == "ja") {
            $num = 1;
        }

        $uitvaartcentra = new uitvaartcentraModel();
        return $uitvaartcentra->insertUitvaartcentra($name, $street, $houseNumber, $city, $num, $comment);
    }

    function editUitvaartcentra($id, $name, $street, $houseNumber, $city, $can_deliver, $comment)
    {
        $num = 0;

        if ($can_deliver == "ja") {
            $num = 1;
        }

        $uitvaartcentra = new uitvaartcentraModel();
        return $uitvaartcentra->editUitvaartcentra($id, $name, $street, $houseNumber, $city, $num, $comment);
    }

    function deleteUitvaartcentra($id)
    {
        $uitvaartcentra = new uitvaartcentraModel();
        return $uitvaartcentra->deleteUitvaartcentra($id);
    }
}