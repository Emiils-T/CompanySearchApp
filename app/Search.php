<?php

namespace App;


use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Output\ConsoleOutput;
use App\Api;

class Search
{
    private array $result = [];
    private string $query;
    private string $baseDir;

    public function __construct(string $query, string $baseDir)
    {
        $this->query = $query;
        $this->baseDir = $baseDir;
    }

    public function getSearch(): array
    {
        $apiData = Api::getApi($this->baseDir, $this->query);
        $data = json_decode(file_get_contents($apiData));

        foreach ($data->result->records as $record) {

            $this->result[] = new Result(
                $record->name,
                $record->type,
                $record->registered,
                $record->address,
                $record->terminated,
            );
        }
        return $this->result;
    }

    public function displayResults(): void
    {
        $rows = [];
        foreach ($this->getSearch() as $index => $record) {
            $rows[] = [
                $index,
                $record->getName(),
                $record->getType(),
                $record->getRegistered(),
                $record->getAddress(),
                $record->getTerminated(),
            ];
        }

        $output = new ConsoleOutput();
        $table = new Table($output);

        $table
            ->setHeaders(['Index', 'Name', 'Type', 'Registered', 'Address', 'Terminated'])
            ->setRows($rows);
        $table->render();
    }
}