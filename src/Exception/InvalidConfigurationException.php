<?php

namespace Bencagri\Artisan\Deployer\Exception;

class InvalidConfigurationException extends \InvalidArgumentException
{
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}
