<?php

namespace Bencagri\Artisan\Deployer\Requirement;

use Bencagri\Artisan\Deployer\Server\Server;
use Bencagri\Artisan\Deployer\Task\Task;

abstract class AbstractRequirement
{
    /** @var Server[] */
    private $servers;

    public function __construct(array $servers)
    {
        $this->servers = $servers;
    }

    public function getServers() : array
    {
        return $this->servers;
    }

    abstract public function getChecker() : Task;

    abstract public function getMessage() : string;
}
