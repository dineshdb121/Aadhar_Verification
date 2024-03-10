<?php

// Token
$ch = curl_init();
$url = "https://www.devkng.com/kyc/token.php";
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$resp = curl_exec($ch);
if($e = curl_error($ch)) {
    echo $e;
} else {
    $data = json_decode($resp,true);
    $access_token = $data['access_token'];
}
curl_close($ch);

// Function to verify OTP
function verifyOTP($otp, $ref_id, $access_token) {
    // API endpoint URL for OTP verification
    $url = 'https://api.sandbox.co.in/kyc/aadhaar/okyc/otp/verify';

    // Request body for OTP verification
    $data = json_encode(array(
        'otp' => $otp,
        'ref_id' => $ref_id
    ));

    // Request headers
    $headers = array(
        'Authorization: ' . $access_token,
        'Accept: application/json',
        'Content-Type: application/json',
        'x-api-key: key_live_5mLgQntwj9QnW9XmRWc3Vn7XBPJ2Bqcw', // Enter Your Api Key here
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
        return json_encode(array('code' => 500, 'message' => 'Error: ' . curl_error($ch)));
    }

    // Close cURL session
    curl_close($ch);

    // Return the response
    return $response;
}

// Check if request is POST and contains OTP and ref_id
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['otp']) && isset($_POST['ref_id'])) {
    $otp = $_POST['otp'];
    $ref_id = $_POST['ref_id'];

    // Verify OTP
    $response = verifyOTP($otp, $ref_id, $access_token);

    // Output the response
    echo $response;
} else {
    // Invalid request
    echo json_encode(array('code' => 400, 'message' => 'Bad Request'));
}
?>
