<?php

class Row
{

    private string $date;
    private string $cause;
    private string $typeOfDeath;

    public function __construct(string $date, string $cause, string $typeOfDeath)
    {
        $this->date = $date;
        $this->cause = $cause;
        $this->typeOfDeath = $typeOfDeath;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function getCause(): string
    {
        return $this->cause;
    }

    public function getTypeOfDeath(): string
    {
        return $this->typeOfDeath;
    }
}