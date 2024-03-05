<?php

//curl request for generating auth token
$url='https://api.sandbox.co.in/authenticate';

$headers[]='accept: application/json';
$headers[]='x-api-key: key_live_5mLgQntwj9QnW9XmRWc3Vn7XBPJ2Bqcw';
$headers[]='x-api-version: 1.0';
$headers[]='x-api-secret: secret_live_k39UIHmcDcyZ3iAjcnyeLBLheKTZqqGf';


$ch = curl_init($url);
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
$result = curl_exec($ch);
echo $result;
