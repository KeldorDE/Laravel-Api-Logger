<?php

namespace KeldorDE\ApiLogger\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;

class SendApiLog implements ShouldQueue
{
    use Dispatchable, Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private readonly string $message,
        private readonly string $level,
        private readonly string $stackTrace,
    ) {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $apiConfig = Config::get('api-logger');

        if (empty($apiConfig['endpoint']) === true) {
            return;
        }
        if (empty($apiConfig['token']) === true) {
            return;
        }
        if (empty($apiConfig['user_agent']) === true) {
            return;
        }

        try {
            Http::withHeaders([
                $apiConfig['token_header_name'] => $apiConfig['token'],
                'User-Agent' => $apiConfig['user_agent'],
            ])
                ->asForm()
                ->post($apiConfig['endpoint'], [
                    $apiConfig['post_field_names']['level'] => $this->level,
                    $apiConfig['post_field_names']['message'] => $this->message,
                    $apiConfig['post_field_names']['stacktrace'] => $this->stackTrace,
                ]);
        } catch (ConnectionException) {
            //
        }
    }
}
