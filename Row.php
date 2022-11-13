<?php

class Row
{
//    private array $row;
//
//    public function __construct(array $row){
//
//        $this->row = $row;
//    }

    private string $date;
    private string $cause;
    private string $nonViolentDeath;
    private string $violentDeath;


    public function __construct(string $date, string $cause, string $nonViolentDeath, string $violentDeath)
    {
        $this->date = $date;
        $this->cause = $cause;
        $this->nonViolentDeath = $nonViolentDeath;
        $this->violentDeath = $violentDeath;
    }


    public function getDate(): string
    {
        return $this->date;
    }


    public function getCause():string
    {
        return $this->cause;
    }


    public function getNonViolentDeath(): string
    {
        return $this->nonViolentDeath;
    }

    public function getViolentDeath(): string
    {
        return $this->violentDeath;
    }


}