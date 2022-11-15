<?php declare(strict_types=1);

class DataCollection
{

    private array $data = [];


    public function addData(Row $row): void
    {
        $this->data [] = $row;
    }


    public function getAllData(): array
    {
        return $this->data;
    }


    public function getTotalSum(): int
    {
        return count($this->data);
    }


    public function setAllCauses(): void
    {
        foreach ($this->data as $row)
            $row->addAllDeathCauses();
    }


    public function searchDeathCause(string $deathCause): int
    {
        $count = 0;
        foreach ($this->data as $row) {
            if (in_array(strtolower($deathCause), $row->getDeathCauses())) {
                $count++;
            }
        }
        return $count;
    }

}