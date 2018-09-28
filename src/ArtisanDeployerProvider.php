<?php

namespace Bencagri\Artisan\Deployer;

use Bencagri\Artisan\Deployer\Command\DeployCommand;
use Bencagri\Artisan\Deployer\Command\RollbackCommand;
use Illuminate\Support\ServiceProvider;

class ArtisanDeployerProvider extends ServiceProvider
{

    public function register(){
        $this->commands([
            DeployCommand::class,
            RollbackCommand::class
        ]);
    }

}