<?php


namespace Bencagri\Artisan\Deployer\Task;

use Bencagri\Artisan\Deployer\Server\Server;

class Task
{
    /** @var Server[] $servers */
    private $servers;
    private $shellCommand;
    private $envVars;

    public function __construct(array $servers, string $shellCommand, array $envVars = [])
    {
        if (empty($servers)) {
            throw new \InvalidArgumentException('The "servers" argument of a Task cannot be an empty array. Add at least one server.');
        }

        $this->servers = $servers;
        $this->shellCommand = $shellCommand;
        $this->envVars = $envVars;
    }

    /**
     * @return Server[]
     */
    public function getServers() : array
    {
        return $this->servers;
    }

    public function isLocal() : bool
    {
        foreach ($this->servers as $server) {
            if (!$server->isLocalHost()) {
                return false;
            }
        }

        return true;
    }

    public function isRemote() : bool
    {
        return !$this->isLocal();
    }

    public function getShellCommand() : string
    {
        return $this->shellCommand;
    }

    public function getEnvVars() : array
    {
        return $this->envVars;
    }
}
