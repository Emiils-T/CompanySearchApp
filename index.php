<?php

require_once './vendor/autoload.php';

use App\Search;


while (true) {
    $query = (string)readline("Enter company name to search or press enter to exit: ");
    if ($query === "" || $query === null) {
        exit;
    }
    $baseDir = __DIR__;

    $search = new Search($query, $baseDir);
    $search->displayResults();
}