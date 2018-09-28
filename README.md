Artisan Deployer
================

<p align="center">
<img src="https://raw.githubusercontent.com/bencagri/artisan-deployer/master/docs/images/artisan-deployer.gif">
</p>


[![Build Status](https://travis-ci.org/bencagri/artisan-deployer.svg?branch=master)](https://travis-ci.org/bencagri/artisan-deployer)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/bencagri/artisan-deployer/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/bencagri/artisan-deployer/?branch=master)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/bencagri/artisan-deployer/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)


**Artisan Deployer is the easiest way to deploy your Laravel applications.**

### Features

  * Zero dependencies. No Python. No Ruby. No Capistrano. No Ansible. Nothing.
  * Zero configuration files. No YAML. No XML. No JSON. Just pure PHP awesomeness.
  * Multi-server and multi-stage deployment (e.g. "production", "staging", "qa").
  * Zero downtime deployments.
  * Supports Laravel 5.x applications.
  * Compatible with GitHub, BitBucket, GitLab and your own Git servers.

### Requirements

  * Your local machine: PHP 7.1 or higher and a SSH client.
  * Your remote servers: they allow SSH connections from the local machine.
  * Your application: it can use any version of Laravel 5.x

### Documentation

* [Installation](docs/installation.md)
* [Getting Started](docs/getting-started.md)
* [Configuration](docs/configuration.md)
* [Default Deployer](docs/default-deployer.md)

> **NOTE**
> Artisan Deployer does not "provision" servers (like installing a web server and the
> right PHP version for your application); use Ansible if you need that.
> Artisan Deployer does not deploy containerized applications: use Kubernetes if you
> need that.
