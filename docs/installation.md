Installation
============

Artisan Deployer is distributed as a package that must be installed in each Laravel
application that you want to deploy.



**Step 1.** Download the package:

```console
$ cd your-laravel-project/
$ composer require bencagri/artisan-deployer
```
**Step 2.** Enable the providers:

In config/app.php 

```php
// ...
 'providers' => [
   /*
    * Artisan Deployer
    */
   \Bencagri\Artisan\Deployer\ArtisanDeployerProvider::class
 ]
}
```