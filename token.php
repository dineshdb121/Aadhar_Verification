<?php

//curl request for generating auth token
$url='https://api.sandbox.co.in/authenticate';

$headers[]='accept: application/json';
$headers[]='x-api-key: key_live_5mLgQn3Vn7XBPJ2Bqcw'; // API key
$headers[]='x-api-version: 1.0';
$headers[]='x-api-secret: secret_live_k39UIHmcDcyZ3iAjcnyeLBLheKTZqqGf'; // Secret Key


$ch = curl_init($url);
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
$result = curl_exec($ch);
echo $result; // you  Copy the output for the Token
