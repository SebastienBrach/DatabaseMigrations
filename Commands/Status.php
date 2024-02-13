<?php

namespace Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class Status extends Command
{
    protected static $defaultName = 'status';

    protected function configure()
    {
        $this
            ->setDescription("Permet d'avoir les status sur les migrations et la BDD");
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $command = "php vendor/bin/phinx status";
        $output->writeln("Exécution de la commande : $command");
        $outputText = shell_exec("$command --ansi");
        $output->writeln($outputText);
        return Command::SUCCESS;
    }
}
