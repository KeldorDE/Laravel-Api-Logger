## About
An API logger channel that can be used to send Log messages to an API endpoint.


## Usage
- Export the API logger configuration file  
  `php artisan vendor:publish --provider="KeldorDE\ApiLogger\ApiLoggerServiceProvider" --tag="config"`
- Add the following array element to the `channels` array in `config/logging.php`
  
      'api' => [
          'driver' => 'custom',
          'via' => \KeldorDE\ApiLogger\Logger\ApiLogChannel::class,
      ],
- Configure the environment variables  
  `LOG_CHANNEL=stack`  
  `LOG_STACK=api`  
  `LOG_API_ENDPOINT=https://api.example.com/logs/create`  
  `LOG_API_TOKEN=some-api-token`  
  `LOG_API_USER_AGENT=Some/UserAgent`  


## Environment variables

- **LOG_API_ENDPOINT**
  Define an API endpoint URL to send log messages to.  
  The Log messages are sent as POST request with the following fields:
  - subject contains the log level (warning etc.)
  - message contains the log message
  - stacktrace contains the stacktrace (optional)

- **LOG_API_TOKEN** 
  The API token is sent via the `X-Api-Token` HTTP header

- **LOG_API_USER_AGENT** 
  The user agent string that is used for the HTTP POST request

