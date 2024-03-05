<?php
// Function to verify OTP
function verifyOTP($otp, $ref_id) {
    // API endpoint URL for OTP verification
    $url = 'https://api.sandbox.co.in/kyc/aadhaar/okyc/otp/verify';

    // Request body for OTP verification
    $data = json_encode(array(
        'otp' => $otp,
        'ref_id' => $ref_id
    ));

    // Request headers
    $headers = array(
        'Authorization: eyJhbGciOiJIUzUxMiJ9.eyJhdWQiOiJBUEkiLCJyZWZyZXIjoiZXlKaGJHY2lPaUpJVXpVeE1pSjkuZXlKaGRXUWlPaUpCVUVraUxDSnpkV0lpT2lKa2EzQnliMnBsWTNSek1USXhRR2R0WVdsc0xtTnZiU0lzSW1Gd2FWOXJaWGtpT2lKclpYbGZiR2wyWlY4MWJVeG5VVzUwZDJvNVVXNVhPVmh0VWxkak0xWnVOMWhDVUVveVFuRmpkeUlzSW1semN5STZJbUZ3YVM1ellXNWtZbTk0TG1OdkxtbHVJaXdpWlhod0lqb3hOelF4TURrMU1qRXdMQ0pwYm5SbGJuUWlPaUpTUlVaU1JWTklYMVJQUzBWT0lpd2lhV0YwSWpveE56QTVOVFU1TWpFd2ZRLlVrR1RPYlBMbm9VMjJPVW5KWmxfZXllZ3doTVp6d3p2YjdMVWRGMDhhbW1KMmZwT3h3cTFQMWppa1IyT3RfcnF6VXk4c2wyTUlZeGhJX2QzaUhwQ2NBIiwic3ViIjoiZGtwcm9qZWN0czEyMUBnbWFpbC5jb20iLCJhcGlfa2V5Ijoia2V5X2xpdmVfNW1MZ1FudHdqOVFuVzlYbVJXYzNWbjdYQlBKMkJxY3ciLCJpc3MiOiJhcGkuc2FuZGJveC5jby5pbiIsImV4cCI6MTcwOTY0NTYxMCwiaW50ZW50IjoiQUNDRVNTX1RPS0VOIiwiaWF0IjoxNzA5NTU5MjEwfQ.hnpBqoKAlNoswLGoQyFDcYSzB_ZeoTiqTjClXZhdTqbYsh5fYF4pSDWPhB6QkZcMBm8Ex3RIT6mzhPFGR6yRXQ',
        'Accept: application/json',
        'Content-Type: application/json',
        'x-api-key: key_live_5mLgQntwj9QnW9Xm7XBPJ2Bqcw', // Enter Your Api Key here
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
    $response = verifyOTP($otp, $ref_id);

    // Output the response
    echo $response;
} else {
    // Invalid request
    echo json_encode(array('code' => 400, 'message' => 'Bad Request'));
}
?>
