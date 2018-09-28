<?php


namespace Bencagri\Artisan\Deployer\Requirement;

use Bencagri\Artisan\Deployer\Task\Task;

class CommandExists extends AbstractRequirement
{
    private $commandName;

    public function __construct(array $servers, string $commandName)
    {
        parent::__construct($servers);
        $this->commandName = $commandName;
    }

    public function getMessage() : string
    {
        return sprintf('<ok>[OK]</> <command>%s</> command exists', $this->commandName);
    }

    public function getChecker() : Task
    {
        $shellCommand = sprintf('%s %s', $this->isWindows() ? 'where' : 'which', $this->commandName);

        return new Task($this->getServers(), $shellCommand);
    }

    private function isWindows() : bool
    {
        return '\\' === DIRECTORY_SEPARATOR;
    }
}
