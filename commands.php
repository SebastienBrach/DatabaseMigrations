<?php

require __DIR__ . '/vendor/autoload.php';

$application = new Symfony\Component\Console\Application();
$application->add(new Commands\Dump());
$application->add(new Commands\CreateMigration());
$application->add(new Commands\RunMigrations());
$application->add(new Commands\RunRollback());
$application->add(new Commands\Status());
$application->add(new Commands\AddBreakpoint());
$application->add(new Commands\RemoveBreakpoint());
$application->add(new Commands\CreateSeed());
$application->add(new Commands\RunSeed());
$application->add(new Commands\Scripts\UpdateDatabase());
$application->run();
