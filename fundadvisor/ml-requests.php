<?php


//Make beneficiary prediction

function ml_beneficiary($vlsa, $division, $location, $capacity, $average_age, $status, $activity,$male, $female, $meeting, $year, $savings, $shareouts, $loan_taken, $loan_returned) {
    $curl = curl_init();

    curl_setopt_array($curl, [
    CURLOPT_PORT => "5000",
    CURLOPT_URL => 'http://127.0.0.1:5000/predict-beneficiary?VSLA='. $vlsa .'&Division='. $division .'&Location='. $location.'&Capacity='.$capacity.'&Average%20Age%20group='.$age.'&Status='. $status.'&Activity='.$activity .'&Male='. $male .'&Female='. $female .'&Meeting%20Schedule='. $meeting .'&Year='. $year.'&Savings='.$savings .'&Shareouts='.$shareouts.'&Loans%20Taken='.$loan_taken.'&Loan%20Amount%20Returned%20='.$loan_returned,
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
        return "cURL Error #:" . $err;
    } else {
        return $response;
    }
}

//Predict loans to be taken
function ml_loan($vlsa, $division, $location, $capacity, $average_age, $status, $activity,$male, $female, $meeting, $year, $savings) {
    $curl = curl_init();

    curl_setopt_array($curl, [
    CURLOPT_PORT => "5000",
    CURLOPT_URL => 'http://127.0.0.1:5000/loans-taken?VSLA='. $vlsa .'&Division='. $division .'&Location='. $location.'&Capacity='.$capacity.'&Average%20Age%20group='.$age.'&Status='. $status.'&Activity='.$activity .'&Male='. $male .'&Female='. $female .'&Meeting%20Schedule='. $meeting .'&Year='. $year.'&Savings='.$savings,
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
        return "cURL Error #:" . $err;
    } else {
        return $response;
    }
}

//Predict loans to be returned
function ml_loan_returned($vlsa, $division, $location, $capacity, $average_age, $status, $activity,$male, $female, $meeting, $year, $savings, $loan_taken) {
    $curl = curl_init();

    curl_setopt_array($curl, [
    CURLOPT_PORT => "5000",
    CURLOPT_URL => 'http://127.0.0.1:5000/loans-returned?VSLA='. $vlsa .'&Division='. $division .'&Location='. $location.'&Capacity='.$capacity.'&Average%20Age%20group='.$age.'&Status='. $status.'&Activity='.$activity .'&Male='. $male .'&Female='. $female .'&Meeting%20Schedule='. $meeting .'&Year='. $year.'&Savings='.$savings .'&Loans%20Taken='.$loan_taken,
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
        return "cURL Error #:" . $err;
    } else {
        return $response;
    }
}
