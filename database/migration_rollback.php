<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
use Lumin\App;

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->safeLoad();

$app      = new App(dirname(__DIR__));
$app->boot();
$app->db->rollbackMigrations();
