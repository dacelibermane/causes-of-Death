<?php
class DataCollection{

    private Row $header;
    private array $data = [];


    public function addHeader(Row $headerRow): void {
        $this->header = $headerRow;
    }

    public function addData(Row $row): void {
        $this->data [] = $row;
    }

    public function getTotalSum(): int {
        return count($this->data);
    }

    public function getHeader(): Row {
        return $this->header;
    }


    public function getAllData(): array {
        return $this->data;
    }

}