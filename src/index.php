<!DOCTYPE html>
<html>
<head>
	<title>Simple WebSite/API</title>
</head>
<body>
<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http:/host.docker.internal:86/1.0/foodimages",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

$response = json_decode($response, true); //because of true, it's in an array

foreach ($response["data"]["foods"] as $key => $value ) {
  echo $value['url']."<br>";
}

?>
</body>
</html>