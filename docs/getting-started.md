Getting Started
===============

Deploying and Rolling Back
--------------------------

After installing the bundle, your Laravel application will have two new global
commands called ``deploy`` and ``rollback``. The ``deploy`` command publishes
your local Laravel application into one or more remote servers. The ``rollback``
command reverts the remote Laravel application to the previous version.

Artisan Deployer can deploy to any number of servers, even when they are of different
type (e.g. two web servers, one database server and one worker server). It also
supports multiple stages, so you can tailor the deployed application to
different needs (production servers, staging server, etc.)

Each stage uses its own configuration file. The default stage is called `prod`,
but you can pass any stage name as the argument of the deploy/rollback commands:

```bash
# deploy the current application to the "prod" server(s)
$ php artisan deploy

# deploy the current application to the "staging" server(s)
$ php artisan deploy staging

# rolls back the app in "prod" server(s) to its previous version
$ php artisan rollback

# rolls back the app in "qa" server(s) to its previous version
$ php artisan rollback qa
```

Debugging Issues
----------------

A single failure in a single command in any server cancels the entire deployment
process automatically. This is done to avoid leaving you with a half-deployed
application.

The full details of the deployment process, including the commands executed on
remote servers and their results, are logged in a file named after the stage.
For example, if you deploy a Laravel  application to the `prod` stage, the log
file will be `storage/logs/deploy_prod.log`.

If you prefer to see the detailed information in real time, add the `-v` option
to the deploy/rollback commands to run them in verbose mode:

```bash
# '-v' shows the full details of the deploy/roll back processes
$ ./artiasn deploy -v
$ ./artisan rollback -v
```


Testing the Deployment and the Rollback
---------------------------------------

Testing a new deployment tool is always scary. Will it work as promised? Will it
fail and wipe out my servers? For that reason, EasyDeploy commands include a
`--dry-run` option to **show the commands executed by the deployment/rollback,
without actually executing them**. Always include this option when using
Artisan Deployer for the first time:

```bash
# show the commands to deploy into "prod", but don't execute them
$ php artisan deploy --dry-run

# show the commands to roll back "staging" server(s), but don't execute them
$ php artisan rollback staging --dry-run
```

This option is more interesting when combined with the `-v` option, so you can
see in real-time the full details of the executed commands without actually
executing any of them.

You are almost ready to deploy your Laravel application. Read the next article
so you can learn how to configure the deployment in less than one minute.
