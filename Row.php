<?php

class Row
{
    private string $date;
    private string $typeOfDeath;
    private string $nonViolentDeath;
    private string $typeOfViolence;
    private string $violentDeath;

    public function __construct(string $date, string $typeOfDeath, string $nonViolentDeath, string $typeOfViolence, string $violentDeath)
    {
        $this->date = $date;
        $this->typeOfDeath = $typeOfDeath;
        $this->nonViolentDeath = $nonViolentDeath;
        $this->typeOfViolence = $typeOfViolence;
        $this->violentDeath = $violentDeath;
    }

    public function removeDuplicates(string $deathType): string
    {
        return implode("; ", array_unique(explode(";", $deathType)));
    }

    public function getRowHeader(): string
    {
        return "$this->date: $this->typeOfDeath | $this->nonViolentDeath | $this->typeOfViolence | $this->violentDeath";
    }

    public function getRowEntry(): string {
        if($this->typeOfDeath === "Vardarbīga nāve"){
            return "$this->date: $this->typeOfDeath | ". $this->removeDuplicates($this->violentDeath) . " | " .  $this->removeDuplicates($this->typeOfViolence);
        }
        if($this->typeOfDeath === "Nevardarbīga nāve") {
            return "$this->date: $this->typeOfDeath | " .  $this->removeDuplicates($this->nonViolentDeath) . ".";
        }
        return "$this->date: $this->typeOfDeath";

    }
}