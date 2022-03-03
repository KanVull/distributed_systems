<?php
    // https://yandex.ru/pogoda/murom
    $_data = json_decode(file_get_contents('php://input'), true);
    header('Content-Type: application/json; charset=utf-8');
    $ch = curl_init('https://yandex.ru/pogoda/murom');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HEADER, false);
    $page = curl_exec($ch);
    curl_close($ch);

    // <span class="temp__value temp__value_with-unit">−2</span>

    $c = preg_match("\<span class=\"temp__value temp__value_with-unit\"\>*\<\/span\>", $page, $weather);
    $s = $weather[0];

    $response = [];
    $response["weather"] = $page;
    
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