<?php

namespace Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class Dump extends Command
{
    protected static $defaultName = 'dump';

    protected function configure()
    {
        $this
            ->setDescription('Permet de faire un dump de la base de donnée')
            ->addArgument('dbHost', InputArgument::OPTIONAL, 'Database Host')
            ->addArgument('dbName', InputArgument::OPTIONAL, 'Database name')
            ->addArgument('dbUser', InputArgument::OPTIONAL, 'Database username')
            ->addArgument('dbPassword', InputArgument::OPTIONAL, 'Database password')
            ->addArgument('dbPort', InputArgument::OPTIONAL, 'Database port')
            ->addArgument('dumpFile', InputArgument::OPTIONAL, 'Output directory');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $dbHost = is_null($input->getArgument('dbHost')) ? getenv('MYSQL_HOST') : $input->getArgument('dbHost');
        $dbName = is_null($input->getArgument('dbName')) ? getenv('MYSQL_DATABASE') : $input->getArgument('dbName');
        $dbUser = is_null($input->getArgument('dbUser')) ? getenv('MYSQL_USER') : $input->getArgument('dbUser');
        $dbPassword = is_null($input->getArgument('dbPassword')) ? getenv('MYSQL_PASSWORD') : $input->getArgument('dbPassword');
        $dumpFile = is_null($input->getArgument('dumpFile')) ? "Database/Dumps/" . date('Y_m_d_His') . "_dump_" . $dbName . ".sql" : $input->getArgument('dumpFile');
        exec("mysqldump --host=" . $dbHost . " --user=" . $dbUser . " --password=" . $dbPassword . " " . $dbName . " > " . $dumpFile);
        $output->writeln(sprintf('Database dumped to %s', $dumpFile));
        return Command::SUCCESS;
    }
}
