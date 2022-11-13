<?php

require_once "Row.php";
require_once "Statistic.php";

$row = 1;
$entries = [];
if (($handle = fopen("causes-of-death.csv", "r")) !== false) {
    while (($data = fgetcsv($handle, 1000, ",")) !== false) {

//        $nonViolent = explode(";", $data[3]);
//        $violent= explode(";", $data[4]);
//        array_filter($nonViolent)
//        array_filter($violent))

        $entries[] = new Row($data[1], $data[2], $data[3], $data[4]);
        $statistics = new Statistic($entries);

       $row++;
    }
    fclose($handle);
}


echo "Ekspertīzēs noteikto nāves cēloņu statistika." . PHP_EOL;
echo "Kopumā atrasti " . count($statistics->getStatistics()). " ieraksti." . PHP_EOL;
//echo "No tiem " .
var_dump($statistics->addData($entries));

//var_dump($entries);
//var_dump($causes->getAllData());



