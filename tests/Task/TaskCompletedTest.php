<?php

namespace Bencagri\Artisan\Deployer\Tests;

use Bencagri\Artisan\Deployer\Server\Server;
use Bencagri\Artisan\Deployer\Task\TaskCompleted;
use PHPUnit\Framework\TestCase;

class TaskCompletedTest extends TestCase
{
    public function test_server()
    {
        $result = new TaskCompleted(new Server('deployer@host1'), 'aaa', 0);

        $this->assertSame('deployer', $result->getServer()->getUser());
        $this->assertSame('host1', $result->getServer()->getHost());
    }

    public function test_output()
    {
        $result = new TaskCompleted(new Server('localhost'), 'aaa   ', 0);

        $this->assertSame('aaa   ', $result->getOutput());
        $this->assertSame('aaa', $result->getTrimmedOutput());
    }

    public function test_exit_code()
    {
        $result = new TaskCompleted(new Server('localhost'), 'aaa', -1);

        $this->assertSame(-1, $result->getExitCode());
        $this->assertFalse($result->isSuccessful());
    }
}
