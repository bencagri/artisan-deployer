<?php

namespace Bencagri\Artisan\Deployer;

use Bencagri\Artisan\Deployer\Server\Property;
use Bencagri\Artisan\Deployer\Server\Server;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


class Context
{
    private $localHost;
    private $dryRun;
    private $debug;
    private $input;
    private $output;
    private $projectDir;
    private $logFilePath;

    public function __construct(InputInterface $input, OutputInterface $output, string $projectDir, string $logFilePath, bool $isDryRun, bool $isVerbose)
    {
        $this->input = $input;
        $this->output = $output;
        $this->projectDir = $projectDir;
        $this->logFilePath = $logFilePath;
        $this->dryRun = $isDryRun;
        $this->debug = $isVerbose;

        $this->localHost = $this->createLocalHost();
    }

    public function __toString() : string
    {
        return sprintf(
            'dry-run = %s, debug = %s, logFile = %s, localHost = Object(Server), input = Object(InputInterface), output = Object(OutputInterface)',
            $this->dryRun ? 'true' : 'false',
            $this->debug ? 'true' : 'false',
            $this->logFilePath
        );
    }

    public function getLocalHost() : Server
    {
        return $this->localHost;
    }

    public function getLogFilePath() : string
    {
        return $this->logFilePath;
    }

    public function getLocalProjectRootDir() : string
    {
        return $this->localHost->get(Property::project_dir);
    }

    public function isDryRun() : bool
    {
        return $this->dryRun;
    }

    public function isDebug() : bool
    {
        return $this->debug;
    }

    public function getInput() : InputInterface
    {
        return $this->input;
    }

    public function getOutput() : OutputInterface
    {
        return $this->output;
    }

    private function createLocalHost() : Server
    {
        $localhost = new Server('localhost');
        $localhost->set(Property::project_dir, $this->projectDir);

        return $localhost;
    }
}
