<?php

namespace KeldorDE\APILogger\Logger;

use KeldorDE\ApiLogger\Logger\ApiLoggerHandler;
use Monolog\Logger;

class ApiLogChannel
{
    public function __invoke(array $config): Logger
    {
        $logger = new Logger('api');
        $logger->pushHandler(new ApiLoggerHandler());

        return $logger;
    }
}
