<?php

namespace Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class CreateMigration extends Command
{
    protected static $defaultName = 'createMigration';

    protected function configure()
    {
        $this
            ->setDescription('Permet de créer une migration')
            ->addArgument('migrationName', InputArgument::REQUIRED, 'Nom de la migration');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $migrationName = $input->getArgument('migrationName');
        $command = "php vendor/bin/phinx create {$migrationName}";
        $output->writeln("Exécution de la commande : $command");
        $outputText = shell_exec("$command --ansi");
        $output->writeln($outputText);
        return Command::SUCCESS;
    }
}
