<?php

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_PORT => "5000",
  CURLOPT_URL => "http://127.0.0.1:5000/loans-returned?VSLA=Muno&Division=MAKINDYE&Location=Kamwokya&Capacity=45&Average%20Age%20group=45&Status=ACTIVE&Activity=Book%20making&Male=23&Female=23&Meeting%20Schedule=Monthly&Year=2013&Savings=456465&Loans%20Taken=64567",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => [
    "Accept: */*",
    "User-Agent: Thunder Client (https://www.thunderclient.com)"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}