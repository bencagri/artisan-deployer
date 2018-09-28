<?php

namespace Bencagri\Artisan\Deployer\Configuration;

use Bencagri\Artisan\Deployer\Exception\InvalidConfigurationException;
use Bencagri\Artisan\Deployer\Server\Property;
use Bencagri\Artisan\Deployer\Server\Server;
use Bencagri\Artisan\Deployer\Server\ServerRepository;


abstract class AbstractConfiguration
{
    private const RESERVED_SERVER_PROPERTIES = [Property::use_ssh_agent_forwarding];
    protected $servers;
    protected $useSshAgentForwarding = true;

    public function __construct()
    {
        $this->servers = new ServerRepository();
    }

    public function server(string $sshDsn, array $roles = [Server::ROLE_APP], array $properties = [])
    {
        $reservedProperties = array_merge(self::RESERVED_SERVER_PROPERTIES, $this->getReservedServerProperties());
        $reservedPropertiesUsed = array_intersect($reservedProperties, array_keys($properties));
        if (!empty($reservedPropertiesUsed)) {
            throw new InvalidConfigurationException(sprintf('These properties set for the "%s" server are reserved: %s. Use different property names.', $sshDsn, implode(', ', $reservedPropertiesUsed)));
        }

        $this->servers->add(new Server($sshDsn, $roles, $properties));
    }

    public function useSshAgentForwarding(bool $useIt)
    {
        $this->useSshAgentForwarding = $useIt;
    }

    abstract protected function getReservedServerProperties() : array;
}
