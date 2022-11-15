<?php declare(strict_types=1);

class Row
{
    private string $date;
    private string $typeOfDeath;
    private string $nonViolentDeath;
    private string $typeOfViolence;
    private string $violentDeath;
    public array $deathCauses = [];

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

    public function getRowEntry(): string
    {
        if ($this->typeOfDeath === "Vardarbīga nāve") {
            return "$this->date: $this->typeOfDeath | " . $this->removeDuplicates($this->violentDeath) . " | " . $this->removeDuplicates($this->typeOfViolence) . PHP_EOL;
        }
        if ($this->typeOfDeath === "Nevardarbīga nāve") {
            return "$this->date: $this->typeOfDeath | " . $this->removeDuplicates($this->nonViolentDeath) . "." . PHP_EOL;
        }
        return "$this->date: $this->typeOfDeath" . PHP_EOL;
    }

    public function addAllDeathCauses(): void
    {
        $this->deathCauses [] = strtolower($this->typeOfDeath);
        $this->deathCauses = array_merge(explode(";", strtolower($this->nonViolentDeath)), $this->deathCauses);
        $this->deathCauses [] = strtolower($this->removeDuplicates($this->typeOfViolence));
        $this->deathCauses = array_merge(explode(";", strtolower($this->violentDeath)), $this->deathCauses);
    }

    public function getDeathCauses(): array
    {
        return $this->deathCauses;
    }

}