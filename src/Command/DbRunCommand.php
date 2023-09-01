<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'db:run',
    description: 'Run the sql file',
)]
class DbRunCommand extends Command
{
    private String $sqlDir;
    public function __construct() {
        $this->sqlDir = dirname(__DIR__)."\\SQL\\";

        parent::__construct();
    }

    protected function configure(): void {
        $this->addArgument("file", InputArgument::REQUIRED, "The file who will be run");
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $sqlFileName = $this->sqlDir.$input->getArgument("file");
        if (!file_exists($sqlFileName)) {
            $output->writeln("Doesn't file exist under directore ".$this->sqlDir);
            return Command::INVALID;
        }

        if (filesize($sqlFileName) == 0) {
            $output->writeln("The file is empty");
            return Command::INVALID;
        }

        $file = fopen($sqlFileName, "r");
        $sqlQuery = fread($file, filesize($sqlFileName));
        fclose($file);

        $this->getApplication()->find("dbal:run-sql")->run(new ArrayInput(["sql" => $sqlQuery]), $output);

        return Command::SUCCESS;
    }
}
