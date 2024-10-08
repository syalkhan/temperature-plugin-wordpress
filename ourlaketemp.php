<?php

/**
 * Plugin Name: Our Lake Temp
 * Description: Plugin to connect Wordpress to Our Lake Temp
 * Version: 1.0.0
 * Author: lyihaoo
 */


function olt_shortcode()
{

    $sensor_id = "597884";
    $url = "https://us-central1-temp-sensor-api-backend-1.cloudfunctions.net/MonnitFunction";
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => "$url?sensor_id=$sensor_id",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(),
    ));

    $response = curl_exec($curl);

    curl_close($curl);

    try {
        echo json_decode($response)->Result;
    } catch (\Throwable $th) {
        echo "-";
    }
}


add_shortcode("olt_temp", "olt_shortcode")



?>