<?php


namespace Bencagri\Artisan\Deployer\Requirement;

use Bencagri\Artisan\Deployer\Task\Task;

class AllowsLoginViaSsh extends AbstractRequirement
{
    public function getMessage() : string
    {
        return '<ok>[OK]</> The server allows to login via SSH from the local machine';
    }

    public function getChecker() : Task
    {
        $shellCommand = sprintf('echo %s', mt_rand());

        return new Task($this->getServers(), $shellCommand);
    }
}
