<?php


namespace Bencagri\Artisan\Deployer\Task;

use Bencagri\Artisan\Deployer\Server\Server;

/**
 * It is an immutable object that encapsulates the result of executing a task
 * and provides helper methods to get all its information.
 */
class TaskCompleted
{
    private $server;
    private $output;
    private $exitCode;

    public function __construct(Server $server, string $output, int $exitCode)
    {
        $this->server = $server;
        $this->output = $output;
        $this->exitCode = $exitCode;
    }

    public function isSuccessful() : bool
    {
        return 0 === $this->exitCode;
    }

    public function getServer() : Server
    {
        return $this->server;
    }

    public function getOutput() : string
    {
        return $this->output;
    }

    public function getTrimmedOutput() : string
    {
        return trim($this->output);
    }

    public function getExitCode() : int
    {
        return $this->exitCode;
    }
}
