<?php

namespace Commands\Scripts;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class UpdateDatabase extends Command
{
    protected static $defaultName = 'script/updateDatabase';

    protected function configure()
    {
        $this->setDescription("Permet d'exécuter plusieurs commande pour mettre à jour la base de données");
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $application = $this->getApplication();
        $dumpCommand = $application->find('dump');
        $dumpCommand->run($input, $output);

        $runMigrationCommand = $application->find('runMigration');
        $runMigrationCommand->run($input, $output);

        $addBreakpoint = $application->find('addBreakpoint');
        $addBreakpoint->run($input, $output);

        return Command::SUCCESS;
    }
}
