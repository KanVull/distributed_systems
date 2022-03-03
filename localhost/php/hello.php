<?php
    $data = json_decode(file_get_contents('php://input'), true);
    header('Content-Type: application/json; charset=utf-8');
    $word = $data['word'];
    $mysqli = new mysqli("localhost", "root", null, "words");
    $mysqli -> query("SET NAMES 'utf8'") or die (json_encode('Database connection error'));
    $db_words = $mysqli -> query("SELECT * from WORDS WHERE word LIKE '%$word%' LIMIT 13");
    $data = [];
    while ($row = $db_words -> fetch_assoc()) {          
         $data[] = $row;  
    } 
    $response         = [];
    $response["data"] =  $data;

    echo json_encode($response, JSON_PRETTY_PRINT);
?>