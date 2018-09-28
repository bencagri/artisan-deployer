<?php


namespace Bencagri\Artisan\Deployer\Tests;

use Bencagri\Artisan\Deployer\Context;
use Bencagri\Artisan\Deployer\Server\Property;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\NullOutput;

class ContextTest extends TestCase
{
    public function test_context_creates_localhost()
    {
        $context = new Context(new ArrayInput([]), new NullOutput(), __DIR__, __DIR__.'/deploy_prod.log', true, true);

        $this->assertSame('localhost', $context->getLocalHost()->getHost());
        $this->assertSame(__DIR__, $context->getLocalHost()->get(Property::project_dir));
    }
}
