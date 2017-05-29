<?php
error_reporting(E_ALL);
ini_set('max_execution_time', 0);

require_once 'bootstrap.php';

$config = Ezer_Config::createFromPath('config.xml');

$server = new Ezer_BusinessProcessServer(new Ezer_XmlLogicPersistance($config->logicPath, $config->instancePath));

$server->addCasePersistance(new Ezer_XmlCasePersistance($config->casesPath));

$server->addThreadClient(new Ezer_BusinessProcessClient($server, $config->phpExe));
$server->addThreadClient(new Ezer_BusinessProcessClient($server, $config->phpExe));
//$server->addThreadClient(new Ezer_BusinessProcessClient($server, $config->phpExe));
//$server->addThreadClient(new Ezer_BusinessProcessClient($server, $config->phpExe));
//$server->addThreadClient(new Ezer_BusinessProcessClient($server, $config->phpExe));

$server->run();
