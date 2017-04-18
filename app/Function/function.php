<?php
/**
 * weather API
 * @param  string $city localtion
 * @return object
 */
function weatherAPI($city = 'hà-nội')
{
    try {
        $BASE_URL = "http://query.yahooapis.com/v1/public/yql";
        $yql_query = 'select * from weather.forecast where woeid in (select woeid from geo.places(1) where text="'.$city.', vi")';
        $yql_query_url = $BASE_URL . "?q=" . urlencode($yql_query) . "&format=json";
        // Make call with cURL
        $session = curl_init($yql_query_url);
        curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
        $json = curl_exec($session);
        // Convert JSON to PHP object
        $phpObj =  json_decode($json);

        return $phpObj->query->results->channel->item->condition;
    } catch (Exception $e) {
        return false;
    }

}

/**
 * Get Temperature localtion
 * @return number
 */
function getTemperature()
{
    if (isset(weatherAPI()->temp)){
        $data = weatherAPI()->temp;
        $data = round(($data-32)/1.8);

        return $data;
    }else{
        return false;
    }
}

/**
 * Show icon wearther
 * @return string
 */
function getIcon()
{
    $arrIcon = [
        'Sunny' => 'sunny.png',
        'Mostly Sunny' => 'partly_cloudy.png',
        'Partly Cloudy' => 'partly_cloudy.png',
        'Mostly Cloudy' => 'cloudy.png',
        'Cloudy' => 'cloudy.png',
        'Rain' => 'scattered_showers_day_night.png',
        'Scattered Thunderstorms' => 'thundershowers_day_night.png',
        'Thunderstorms' => 'thundershowers_day_night.png'
    ];

    if (isset(weatherAPI()->text)){
        $data = weatherAPI()->text;
        $icon = '';

        foreach ($arrIcon as $key => $value) {
            if ($data === $key) {
                $icon = $value;
            break;
            }
        }

        return $icon;
    }else{
        return false;
    }
}