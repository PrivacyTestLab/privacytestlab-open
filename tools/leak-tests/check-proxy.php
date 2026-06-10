<?php
// check-proxy.php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$ip = isset($_GET['ip']) ? trim($_GET['ip']) : '';
if (empty($ip)) {
    echo json_encode(['error' => 'Target query address value required.']);
    exit;
}

$API_KEY = "77f505eea0dc466f974815d19b54ffb3"; 
$url = "https://vpnapi.io/api/" . urlencode($ip) . "?key=" . $API_KEY;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);

// CRITICAL SECURITY FIX: Provide a valid User-Agent string to bypass their proxy firewall
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) PrivacyTestLab/1.0');

// OPTIONAL DEVELOPER DEBUG: If your local PHP server lacks updated root SSL certificates, un-comment the lines below:
// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$response = curl_exec($ch);

if(curl_errno($ch)) {
    echo json_encode(['error' => 'Gateway connectivity timeout: ' . curl_error($ch)]);
} else {
    echo $response;
}

curl_close($ch);
?>