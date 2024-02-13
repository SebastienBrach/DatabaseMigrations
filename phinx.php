<?php

$basePath              = '%%PHINX_CONFIG_DIR%%';
$migrationPath         = $basePath . '/Database/Migrations';
$seedsPath             = $basePath . '/Database/Seeders';
$defaultMigrationTable = 'migrations';
$defaultEnvironnement  = getenv('ENVIRONNEMENT');
$versionOrder  = 'creation';

// DB CONFIG
$dbAdapter  = 'mysql';
$dbHost     = getenv('MYSQL_CONTAINER_NAME');
$dbName     = getenv('MYSQL_DATABASE');
$dbUser     = getenv('MYSQL_USER');
$dbPassword = getenv('MYSQL_PASSWORD');
$dbPort     = getenv('MYSQL_PORT');
$dbCharset  = 'utf8';

return array(
    'paths' => array(
        'migrations' => $migrationPath,
        'seeds' => $seedsPath
    ),
    'environments' => array(
        'default_migration_table' => $defaultMigrationTable,
        'default_environment' => $defaultEnvironnement,
        $defaultEnvironnement => array(
            'adapter' => $dbAdapter,
            'host'    => $dbHost,
            'name'    => $dbName,
            'user'    => $dbUser,
            'pass'    => $dbPassword,
            'port'    => $dbPort,
            'charset' => $dbCharset,
        )
    ),
    'version_order' => $versionOrder
);
