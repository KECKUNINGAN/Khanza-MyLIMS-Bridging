<?php

if (preg_match ('/config.php/', basename($_SERVER['PHP_SELF']))) die ('Unable to access this script directly from browser!');

$token = "8nMW6Jt60AR5QSMSszmtajKwivtyS5EnBnAHwXv5cfuDxxqHhbC0RS5htQ9c"; 
$url = "http://192.198.2.1:777";
function jwt_request($token, $post) {

       global $url;

       header('Content-Type: text/html; charset=utf-8');
       header('Content-Type: application/json'); 
       $ch = curl_init(''.$url.'/api/v1/cekup');
       $post = json_encode($post); 
       $authorization = "Authorization: Bearer ".$token; 
       curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization )); // Inject the token into the header
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       curl_setopt($ch, CURLOPT_POST, 1); 
       curl_setopt($ch, CURLOPT_POSTFIELDS, $post); 
       curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
       $result = curl_exec($ch); 
       curl_close($ch); 
       return json_decode($result); 

}

?>
