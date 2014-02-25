<?php

if(isset($_GET['all'])) {
    $files = scandir('fortunes');
    // Removes '.'
    array_shift($files);
    // Removes '..'
    array_shift($files);
    
    $file_name = 'fortunes/' . $files[mt_rand(0, count($files)-1)];
} else if(isset($_GET['url'])) {
    $file_name = preg_match('#^https?://.*#i', $_GET['url']) ? $_GET['url'] : 'http://' . $_GET['url'];
} else if(isset($_GET['file']) && file_exists('fortunes/' . $_GET['file'])) {
    $file_name = 'fortunes/' . $_GET['file'];
} else {
    header("HTTP/1.0 404 Not Found");
    header("Location: ./");
    exit();
}

// Gets all fortune lines as an array
if(!($file = @file($file_name))) {
    die('File error');
}

$fortunes = array();
$offset = 0;

foreach($file as $index => $line) {
    
    // Offset must exist
    if(count($fortunes) <= $offset) {
        $fortunes[$offset] = "";
    }
    
    if($line == "%\n") {
        $offset++;
    } else {
        $fortunes[$offset] .= $line;
    }
}


$fortune = $fortunes[mt_rand(0, count($fortunes)-1)];

echo isset($_GET['html']) ? '<pre>' . $fortune . '</pre><br /><a href="">Another !</a>' : $fortune;
