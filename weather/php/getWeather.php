<?php
    $_data = json_decode(file_get_contents('php://input'), true);
    header('Content-Type: application/json; charset=utf-8');
    $ch = curl_init('https://world-weather.ru/pogoda/russia/murom/');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HEADER, false);
    $page = curl_exec($ch);
    curl_close($ch);

    $s = preg_match("/прогноз погоды в .{1,20} на сегодня/", $page, $city);
    $city = $city[0];
    $s = preg_match("/now-number\">.{1,5}<span>/", $page, $weather);
    $weather = $weather[0];
    $weather = substr(substr($weather, 12), 0, -6);
    $s = preg_match("/Восход:<\/span>.{1,9}<span>/", $page, $sunrise);
    $sunrise = $sunrise[0];
    $sunrise = substr(substr($sunrise, 0, -7), -5);
    $s = preg_match("/Заход:<\/span>.{1,9}<\/li>/", $page, $sunshine);
    $sunshine = $sunshine[0];
    $sunshine = substr(substr($sunshine, 0, -5), -5);

    $response = [];
    $response["weather"] = $weather;
    $response["sunrise"] = $sunrise;
    $response["sunshine"] = $sunshine;
    $response["city"] = $city;
    
    echo json_encode($response);

    // $word = $data['word'];
    // $mysqli = new mysqli("localhost", "root", null, "words");
    // $mysqli -> query("SET NAMES 'utf8'") or die (json_encode('Database connection error'));
    // $db_words = $mysqli -> query("SELECT * from WORDS WHERE word LIKE '%$word%' LIMIT 13");
    // $data = [];
    // while ($row = $db_words -> fetch_assoc()) {          
    //      $data[] = $row;  
    // } 

?>