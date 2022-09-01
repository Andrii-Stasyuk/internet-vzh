<?php
$webhook = '';
$auth_token = '4fb79e817827e038-6b991c880f346f4c-28894d69a030579f';

$jsonData =
    '{
		"auth_token": "'.$auth_token.'",
		"url": "'.$webhook.'",
		"event_types": ["subscribed", "unsubscribed", "delivered", "message", "seen"]
	}';

$ch = curl_init('https://chatapi.viber.com/pa/set_webhook');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
$response = curl_exec($ch);
$err = curl_error($ch);
curl_close($ch);
if($err) {echo($err);}
else {echo($response);}
?>