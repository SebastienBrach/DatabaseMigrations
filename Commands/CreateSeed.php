<?php

namespace Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class CreateSeed extends Command
{
    protected static $defaultName = 'createSeed';

    protected function configure()
    {
        $this
            ->setDescription('Permet de créer un seed')
            ->addArgument('seedName', InputArgument::REQUIRED, 'Nom de la migration');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $migrationName = $input->getArgument('seedName');
        $command = "php vendor/bin/phinx seed:create {$migrationName}";
        $output->writeln("Exécution de la commande : $command");
        $outputText = shell_exec("$command --ansi");
        $output->writeln($outputText);
        return Command::SUCCESS;
    }
}
