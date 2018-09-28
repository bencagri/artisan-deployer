<?php


namespace Bencagri\Artisan\Deployer\Tests;

use Bencagri\Artisan\Deployer\Configuration\ConfigurationAdapter;
use Bencagri\Artisan\Deployer\Configuration\DefaultConfiguration;
use Bencagri\Artisan\Deployer\Configuration\Option;
use PHPUnit\Framework\TestCase;

class ConfigurationAdapterTest extends TestCase
{
    /** @var DefaultConfiguration */
    private $config;

    protected function setUp()
    {
        $this->config = (new DefaultConfiguration(__DIR__))
            ->sharedFilesAndDirs([])
            ->server('host1')
            ->repositoryUrl('git@github.com:symfony/symfony-demo.git')
            ->repositoryBranch('staging')
            ->deployDir('/var/www/symfony-demo')
        ;
    }

    public function test_get_options()
    {
        $config = new ConfigurationAdapter($this->config);

        $this->assertSame('host1', (string) $config->get(Option::servers)->findAll()[0]);
        $this->assertSame('git@github.com:symfony/symfony-demo.git', $config->get(Option::repositoryUrl));
        $this->assertSame('staging', $config->get(Option::repositoryBranch));
        $this->assertSame('/var/www/symfony-demo', $config->get(Option::deployDir));
    }
}
