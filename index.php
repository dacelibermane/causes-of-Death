<?php

require_once "Row.php";
require_once "DataCollection.php";

$data = new DataCollection();
$index = 0;
if (($handle = fopen("causes-of-death.csv", "r")) !== false) {
    while (($row = fgetcsv($handle, 1000, ",")) !== false) {

        if($index == 0){
            $data->addHeader(new Row($row[1], $row[2], $row[3], $row[4], $row[5]));
        }else{
            $data->addData(new Row($row[1], $row[2], $row[3], $row[4], $row[5]));
        }

        $index++;
    }
    fclose($handle);
}

echo "Ekspertīzēs noteikto nāves cēloņu statistika." . PHP_EOL;
echo "Kopumā atrasti " . $data->getTotalSum(). " ieraksti." . PHP_EOL;

echo str_replace("_", " ", ucwords($data->getHeader()->getRowHeader())) . PHP_EOL;








