<?php


namespace Bencagri\Artisan\Deployer\Server;


class ServerRepository
{
    /** @var Server[] $servers */
    private $servers = [];

    public function __toString() : string
    {
        return implode(', ', $this->servers);
    }

    public function add(Server $server) : void
    {
        $this->servers[] = $server;
    }

    public function findAll() : array
    {
        return $this->servers;
    }

    /**
     * @return Server[]
     */
    public function findByRoles(array $roles) : array
    {
        return array_filter($this->servers, function (Server $server) use ($roles) {
            return !empty(array_intersect($roles, $server->getRoles()));
        });
    }
}
