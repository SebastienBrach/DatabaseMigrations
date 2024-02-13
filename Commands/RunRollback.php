<?php

namespace Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class RunRollback extends Command
{
    protected static $defaultName = 'runRollback';

    protected function configure()
    {
        $this
            ->setDescription('Permet de rollback une migration')
            ->addArgument('migrationDate', InputArgument::OPTIONAL, 'Date de la migration (date du fichier || "version" dans la bdd');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $command = "php vendor/bin/phinx rollback";
        $migrationDate = $input->getArgument('migrationDate');
        if (!is_null($migrationDate)) {
            $command .= " -t {$migrationDate}";
        }
        $output->writeln("Exécution de la commande : $command");
        $outputText = shell_exec("$command --ansi");
        $output->writeln($outputText);
        return Command::SUCCESS;
    }
}
