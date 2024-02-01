<?php

namespace App\Command;

use App\Service\SQLService;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'db:run',
    description: 'Init All Tables',
)]
class DbRunCommand extends Command
{
    private SQLService $sQLService;
    public function __construct(SQLService $sQLService) {
        parent::__construct();
        $this->sQLService = $sQLService;
    }

    protected function configure(): void {
        
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {

        $this->sQLService->initContact();
        $this->sQLService->initLanguages();
        $this->sQLService->initProjects();
        $this->sQLService->initSkills();

        return Command::SUCCESS;
    }
}
