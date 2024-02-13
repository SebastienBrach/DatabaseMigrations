<?php

namespace Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class RunSeed extends Command
{
    protected static $defaultName = 'runSeed';

    protected function configure()
    {
        $this
            ->setDescription('Permet de run un seed')
            ->addArgument('seedName', InputArgument::OPTIONAL, 'Nom de la migration');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $command = "php vendor/bin/phinx seed:run";
        $migrationDate = $input->getArgument('seedName');
        if (!is_null($migrationDate)) {
            $command .= " -S {$migrationDate}";
        }
        $output->writeln("Exécution de la commande : $command");
        $outputText = shell_exec("$command --ansi");
        $output->writeln($outputText);
        return Command::SUCCESS;
    }
}
