<?php
include('helper.php');

function create_payment()
{
    $ch = curl_init();
    $secret_key = FLIP_KEY;

    curl_setopt($ch, CURLOPT_URL, FLIP_URL . "/pwf/bill");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);

    curl_setopt($ch, CURLOPT_POST, TRUE);

    $payloads = [
        "title" => "SPP SD",
        "amount" => 50000,
        "type" => "SINGLE",
        "expired_date" => '2024-05-20 15:15',
        "is_address_required" => 0,
        "is_phone_number_required" => 0,
        "step" => 3,
        "sender_name" => 'Arta',
        "sender_email" => 'arta@mail.com',
        "sender_bank" => 'bsm', //statis
        "sender_bank_type" => 'virtual_account' //statis
    ];

    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payloads));

    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Content-Type: application/x-www-form-urlencoded"
    ));

    curl_setopt($ch, CURLOPT_USERPWD, $secret_key . ":");

    $response = curl_exec($ch);
    curl_close($ch);

    var_dump($response);
}

create_payment();
