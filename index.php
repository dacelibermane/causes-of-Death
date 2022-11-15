<?php

require_once "Row.php";
require_once "DataCollection.php";

$data = new DataCollection();
$index = 0;
if (($handle = fopen("causes-of-death.csv", "r")) !== false) {
    while (($row = fgetcsv($handle, 1000, ",")) !== false) {

        $data->addData(new Row($row[1], $row[2], $row[3], $row[4], $row[5]));


        $index++;
    }
    fclose($handle);
}

$data->setAllCauses();

echo "Ekspertīzēs noteikto nāves cēloņu statistika." . PHP_EOL;
echo "Kopumā atrasti " . $data->getTotalSum() . " ieraksti." . PHP_EOL;

while (true) {
    echo "Izvēlieties kādus datus vēlaties apskatīt: " . PHP_EOL;
    echo "Apskatīt visus ierakstus - 1\n";
    echo "Apskatīt konkrētā nāves gadījumu skaitu - 2\n";
    echo "Iziet - 3\n";

    $userSelection = (int)readline("<<");

    switch ($userSelection) {
        case 1:
            foreach ($data->getAllData() as $row) {
                echo $row->getRowEntry();
            }
            break;

        case 2:
            $userSearch = readline("Ierakstiet nāves iemeslu:");
            echo "Kopumā tika atrasti {$data->searchDeathCause($userSearch)} ieraksti." . PHP_EOL;
            break;

        default:
            echo "Uz tikšanos!";
            exit;
    }
    
}











