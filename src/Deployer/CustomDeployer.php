<?php


namespace Bencagri\Artisan\Deployer\Deployer;

use Bencagri\Artisan\Deployer\Configuration\CustomConfiguration;
use Bencagri\Artisan\Deployer\Requirement\AllowsLoginViaSsh;
use Bencagri\Artisan\Deployer\Requirement\CommandExists;


abstract class CustomDeployer extends AbstractDeployer
{
    public function getConfigBuilder() : CustomConfiguration
    {
        return new CustomConfiguration();
    }

    public function getRequirements() : array
    {
        return [
            new CommandExists([$this->getContext()->getLocalHost()], 'ssh'),
            new AllowsLoginViaSsh($this->getServers()->findAll()),
        ];
    }
}
