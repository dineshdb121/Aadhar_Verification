<?php


$headers[]='accept: application/json';
$headers[]='x-api-key: key_live_5mLgQntwj9QnW9XmRWc3Vn7XBPJ2Bqcw';
$headers[]='x-api-version: 1.0';


$auth_token='eyJhbGciOiJIUzUxMiJ9.eyJhdWQiOiJBUEkiLCJyZWZyZXNoX3Rva2VuIjoiZXlKaGJHY2lPaUpJVXpVeE1pSjkuZXlKaGRXUWlPaUpCVUVraUxDSnpkV0lpT2lKa2EzQnliMnBsWTNSek1USXhRR2R0WVdsc0xtTnZiU0lzSW1Gd2FWOXJaWGtpT2lKclpYbGZiR2wyWlY4MWJVeG5VVzUwZDJvNVVXNVhPVmh0VWxkak0xWnVOMWhDVUVveVFuRmpkeUlzSW1semN5STZJbUZ3YVM1ellXNWtZbTk0TG1OdkxtbHVJaXdpWlhod0lqb3hOelF4TURrMU1qRXdMQ0pwYm5SbGJuUWlPaUpTUlVaU1JWTklYMVJQUzBWT0lpd2lhV0YwSWpveE56QTVOVFU1TWpFd2ZRLlVrR1RPYlBMbm9VMjJPVW5KWmxfZXllZ3doTVp6d3p2YjdMVWRGMDhhbW1KMmZwT3h3cTFQMWppa1IyT3RfcnF6VXk4c2wyTUlZeGhJX2QzaUhwQ2NBIiwic3ViIjoiZGtwcm9qZWN0czEyMUBnbWFpbC5jb20iLCJhcGlfa2V5Ijoia2V5X2xpdmVfNW1MZ1FudHdqOVFuVzlYbVJXYzNWbjdYQlBKMkJxY3ciLCJpc3MiOiJhcGkuc2FuZGJveC5jby5pbiIsImV4cCI6MTcwOTY0NTYxMCwiaW50ZW50IjoiQUNDRVNTX1RPS0VOIiwiaWF0IjoxNzA5NTU5MjEwfQ.hnpBqoKAlNoswLGoQyFDcYSzB_ZeoTiqTjClXZhdTqbYsh5fYF4pSDWPhB6QkZcMBm8Ex3RIT6mzhPFGR6yRXQ';


// Check if the 'aadhar_no' parameter is set in the POST request
if(isset($_POST['aadhar_no'])) {
    // Get the value of 'aadhar_no' from the POST request
    $aadhar_no = $_POST['aadhar_no'];

    // API endpoint URL
    $url = 'https://api.sandbox.co.in/kyc/aadhaar/okyc/otp';

    // Request body
    $data = json_encode(array(
        'aadhaar_number' => $aadhar_no
    ));

    // Request headers
    $headers = array(
        'Authorization: eyJhbGciOiJIUzUxMiJ9.eyJhdWQiOiJBUEkiLCJyZWZyZXNoX3Rva2VuIjoiZXlKaGJHY2lPaUpJVXpVeE1pSjkuZXlKaGRXUWlPaUpCVUVraUxDSnpkV0lpT2lKa2EzQnliMnBsWTNSek1USXhRR2R0WVdsc0xtTnZiU0lzSW1Gd2FWOXJaWGtpT2lKclpYbGZiR2wyWlY4MWJVeG5VVzUwZDJvNVVXNVhPVmh0VWxkak0xWnVOMWhDVUVveVFuRmpkeUlzSW1semN5STZJbUZ3YVM1ellXNWtZbTk0TG1OdkxtbHVJaXdpWlhod0lqb3hOelF4TURnek1EQTJMQ0pwYm5SbGJuUWlPaUpTUlVaU1JWTklYMVJQUzBWT0lpd2lhV0YwSWpveE56QTVOVFEzTURBMmZRLlBHZnhieFVZQkd1UGhUcGNkYm00Z2lORHpiRXFjSy1oZHdiMW4wSWMyekRzM2hSSVQ0cVhXRjhpSjhCb3BEc3YteVRIVS01Z1lxUWFUVnFOUHFINFFBIiwic3ViIjoiZGtwcm9qZWN0czEyMUBnbWFpbC5jb20iLCJhcGlfa2V5Ijoia2V5X2xpdmVfNW1MZ1FudHdqOVFuVzlYbVJXYzNWbjdYQlBKMkJxY3ciLCJpc3MiOiJhcGkuc2FuZGJveC5jby5pbiIsImV4cCI6MTcwOTYzMzQwNiwiaW50ZW50IjoiQUNDRVNTX1RPS0VOIiwiaWF0IjoxNzA5NTQ3MDA2fQ.p-bTGsI0hgY16fok1QDdYdu6Yg2ErFCoXktUqCdR6Y64w8Fx5niTAi-kbyEZbOXGRJvuWIl83TssZFxaRzeTRQ',
        'Accept: application/json',
        'Content-Type: application/json',
        'x-api-key: key_live_5mLgQntwj9QnW9XmRWc3Vn7XBPJ2Bqcw',
        'x-api-version: 1.0'
    );

    // Initialize cURL session
    $ch = curl_init();

    // Set cURL options
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    // Execute cURL request
    $response = curl_exec($ch);

    // Check for errors
    if(curl_errno($ch)){
        echo 'Error: ' . curl_error($ch);
    }

    // Close cURL session
    curl_close($ch);

    // Output the response
    echo $response;
} else {
    // If 'aadhar_no' parameter is not set, return an error message
    echo "Error: 'aadhar_no' parameter is not set.";


}


?>