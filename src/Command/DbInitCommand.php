<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'db:init',
    description: 'Database init with new components',
)]
class DbInitCommand extends Command
{
    private String $sqlFile = __DIR__."\\query.sql";

    protected function execute(InputInterface $input, OutputInterface $output): int
    {


        $file = fopen($this->sqlFile, "r");
        $sqlQuery = fread($file, filesize($this->sqlFile));
        fclose($file);

        $this->getApplication()->find("dbal:run-sql")->run(new ArrayInput(["sql" => $sqlQuery]), $output);

        return Command::SUCCESS;
    }
}
