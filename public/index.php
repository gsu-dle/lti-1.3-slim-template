<?php

declare(strict_types=1);

use DI\ContainerBuilder      as DIContainerBuilder;
use GAState\Web\LTI\Slim\App as LTIApp;
use GAState\Web\LTI\Slim\Env as LTIEnv;

require __DIR__ . '/../vendor/autoload.php';

ob_start();

LTIEnv::load(
    $_ENV['BASE_DIR'] ?? __DIR__ . '/../',
    $_ENV['BASE_URI'] ?? dirname($_SERVER['SCRIPT_NAME'])
);

$cmplDir = LTIEnv::getString(LTIEnv::DI_CMPL_DIR);
$proxyDir = LTIEnv::getString(LTIEnv::DI_PRXY_DIR);
$defFile = LTIEnv::getString(LTIEnv::DI_DEF_FILE);

$container = (new DIContainerBuilder())
    //->enableCompilation($cmplDir)
    //->writeProxiesToFile(true, $proxyDir)
    ->useAttributes(true)
    ->addDefinitions($defFile)
    ->build();

$app = $container->get(LTIApp::class);
if ($app instanceof LTIApp) {
    $app->run();
}

ob_end_flush();
