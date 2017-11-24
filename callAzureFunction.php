<?php
//USAGE: echo callAzureFunction("https://cloudmaticafunctions.azurewebsites.net/api/echo?code=JPPXiWIHCmGciaQ6Kj4qpmayDkXcIBFBi68GXziYkMMeWAUMIZ388Q%3D%3D&clientId=default", "{\"text\":\"PHP Postman\"}");

function callAzureFunction($url, $json) {
	$curl = curl_init();

	curl_setopt_array($curl, array(
	  CURLOPT_URL =>
	$url,
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "POST",
	  CURLOPT_POSTFIELDS => $json,
	  CURLOPT_HTTPHEADER => array(
		"cache-control: no-cache",
		"content-type: application/json"
	  ),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
	  echo "cURL Error #:" . $err;
	} else {
	  return $response;
	}
}
