<?php


namespace Bencagri\Artisan\Deployer\Configuration;

use Bencagri\Artisan\Deployer\Server\Server;


class CustomConfiguration extends AbstractConfiguration
{
    // this proxy method is needed because the autocompletion breaks
    // if the parent method is used directly
    public function server(string $sshDsn, array $roles = [Server::ROLE_APP], array $properties = []) : self
    {
        parent::server($sshDsn, $roles, $properties);

        return $this;
    }

    // this proxy method is needed because the autocompletion breaks
    // if the parent method is used directly
    public function useSshAgentForwarding(bool $useIt) : self
    {
        parent::useSshAgentForwarding($useIt);

        return $this;
    }

    protected function getReservedServerProperties() : array
    {
        return [];
    }
}
