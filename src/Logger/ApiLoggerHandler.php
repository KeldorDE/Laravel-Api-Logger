<?php

namespace KeldorDE\ApiLogger\Logger;

use KeldorDE\ApiLogger\Jobs\SendApiLog;
use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Level;
use Monolog\LogRecord;

class ApiLoggerHandler extends AbstractProcessingHandler
{
    public function __construct($level = Level::Debug, bool $bubble = true)
    {
        parent::__construct($level, $bubble);
    }

    protected function write(LogRecord $record): void
    {
        if (empty($record->context['exception']) === false) {
            $stacktrace = $record->context['exception']->getTraceAsString();
        } else {
            $stacktrace = '';
        }

        SendApiLog::dispatch($record->message, $record->level->name, $stacktrace);
    }
}
