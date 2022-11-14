<?php

require_once "Row.php";

$violentDeath = [];
$nonViolentDeath = [];
$unknownDeath = [];

$row = 1;
if (($handle = fopen("causes-of-death.csv", "r")) !== false) {
    while (($data = fgetcsv($handle, 1000, ",")) !== false) {


        $deathCause = "";
        if(strcmp("Nevardarbīga nāve",$data[2] ) === 0) {
            $causeData= explode(";", $data[3]);
            $deathCause = $causeData[0];
        }

        if(strcmp("Vardarbīga nāve", $data[2]) === 0) {
            $causeData = explode(";", $data[4]);
            $deathCause= $causeData[1];
        }

        $entries = new Row($data[1],$deathCause,$data[2]);


        if(strcmp("Nevardarbīga nāve",$entries->getTypeOfDeath()) === 0){

            $nonViolentDeath[] = $entries;
        }
        elseif(strcmp("Vardarbīga nāve",$entries->getTypeOfDeath()) === 0) {

            $violentDeath[] = $entries;
        }
        else
        {
            $unknownDeath[] = $entries;
        }

        $row++;
    }
    fclose($handle);
}


$userSelect = (int)readline("Select type of death: \n 1: Nevardabiga nāve. \n 2: Vardarbīga nāve. \n 3: Nāves cēlonis nav noteikts\n ");

if($userSelect=== 1){
    $year = (int)readline("Enter a year: ");
    foreach ($nonViolentDeath as $key=> $death)
    {
        $tempDate = substr($entries->getDate() ,0,4);
        if (0=== strcmp($year,$tempDate) ){
            echo $key+1 .": Date:". $entries->getDate().". Reason: ". $entries->getCause(). PHP_EOL;

        }
    }

}
if($userSelect=== 2){
    $year =(int)readline("Enter a year: ");
    foreach ($violentDeath as $key=> $death)
    {
        $tempDate= substr($entries->getDate() ,0,4);
        if (strcmp($year,$tempDate) === 0){
            echo $key+1 .": Date:". $entries->getDate().". Reason: ". $entries->getCause(). PHP_EOL;

        }
    }

}
if($userSelect === 3){
    $year = (int)readline("Enter a year: ");
    foreach ( $unknownDeath as $key => $death)
    {
        $tempDate= substr($entries->getDate() ,0,4);
        if (strcmp($year,$tempDate) === 0){
            echo $key+1 .": Date:". $entries->getDate()." Type of dead: ".$entries->getCause(). PHP_EOL;

        }
    }

}









