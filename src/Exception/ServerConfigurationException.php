<?php


namespace Bencagri\Artisan\Deployer\Exception;

class ServerConfigurationException extends \InvalidArgumentException
{
    public function __construct(string $serverName, string $cause)
    {
        parent::__construct(sprintf('The connection string for "%s" server is wrong: %s.', $serverName, $cause));
    }
}
