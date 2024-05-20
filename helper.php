<?php
include('const.php');

function generateRandomString($length = null)
{
    $characters = '0123456789ABCDEFGHJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }
    return $randomString;
}

function curl($uri = null, $params = array())
{

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, FLIP_URL . $uri);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);

    if (isset($params)) {

        curl_setopt($ch, CURLOPT_POST, TRUE);

        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
    }

    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Content-Type: application/x-www-form-urlencoded"
    ));

    curl_setopt($ch, CURLOPT_USERPWD, FLIP_KEY . ":");

    $response = curl_exec($ch);
    curl_close($ch);

    var_dump($response);
    exit;
}
