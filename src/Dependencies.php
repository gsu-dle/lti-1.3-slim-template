<?php

declare(strict_types=1);

namespace GAState\MyLTIApp;

use GAState\MyLTIApp\App     as MyLTIApp;
use GAState\Web\LTI\Slim\Env as LTIEnv;
use GAState\Web\LTI\Slim\App as LTIApp;

return (function () {
    /**
     * Default dependencies from lti-1.3-slim
     *
     * @var array<string,mixed> $ltiDeps
     */
    $ltiDeps = require(LTIEnv::getString(LTIEnv::LTI_DIR) . "/Dependencies.php");


    /**
     * App dependencies / lti-1.3-slim overrides
     *
     * @var array<string,mixed> $appDeps
     */
    $appDeps = [
        LTIApp::class => \DI\get(MyLTIApp::class)
    ];

    return array_merge($ltiDeps, $appDeps);
})();
