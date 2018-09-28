<?php

namespace Bencagri\Artisan\Deployer\EasyDeployBundle\Tests;

use Bencagri\Artisan\Deployer\Server\Server;
use Bencagri\Artisan\Deployer\Server\ServerRepository;
use PHPUnit\Framework\TestCase;

class ServerRepositoryTest extends TestCase
{
    /** @var ServerRepository */
    private $servers;

    protected function setUp()
    {
        $repository = new ServerRepository();
        $repository->add(new Server('host0'));
        $repository->add(new Server('host1', []));
        $repository->add(new Server('host2', ['app']));
        $repository->add(new Server('host3', ['workers', 'worker1']));
        $repository->add(new Server('host4', ['workers', 'worker2']));
        $repository->add(new Server('host5', ['database']));

        $this->servers = $repository;
    }

    public function test_find_all()
    {
        $servers = $this->servers->findAll();
        $serverNames = array_values(array_map(function ($v) { return (string) $v; }, $servers));

        $this->assertSame(['host0', 'host1', 'host2', 'host3', 'host4', 'host5'], $serverNames);
    }

    /** @dataProvider findByRolesProvider */
    public function test_find_by_roles(array $roles, array $expectedResult)
    {
        $servers = $this->servers->findByRoles($roles);
        // array_values() is needed to reset the values of the keys
        $serverNames = array_values(array_map(function ($v) { return (string) $v; }, $servers));

        $this->assertSame($expectedResult, $serverNames);
    }

    public function findByRolesProvider()
    {
        yield [[], []];
        yield [['app'], ['host0', 'host2']];
        yield [['workers'], ['host3', 'host4']];
        yield [['worker1'], ['host3']];
        yield [['worker2'], ['host4']];
        yield [['database'], ['host5']];
        yield [['database', 'workers'], ['host3', 'host4', 'host5']];
        yield [['app', 'database', 'worker1'], ['host0', 'host2', 'host3', 'host5']];
    }
}
