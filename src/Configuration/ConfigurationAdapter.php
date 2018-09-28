<?php


namespace Bencagri\Artisan\Deployer\Configuration;

use Bencagri\Artisan\Deployer\Helper\Str;
use Symfony\Component\HttpFoundation\ParameterBag;


final class ConfigurationAdapter
{
    private $config;
    /** @var ParameterBag */
    private $options;

    public function __construct(AbstractConfiguration $config)
    {
        $this->config = $config;
    }

    public function __toString() : string
    {
        return Str::formatAsTable($this->getOptions()->all());
    }

    public function get(string $optionName)
    {
        if (!$this->getOptions()->has($optionName)) {
            throw new \InvalidArgumentException(sprintf('The "%s" option is not defined.', $optionName));
        }

        return $this->getOptions()->get($optionName);
    }

    private function getOptions() : ParameterBag
    {
        if (null !== $this->options) {
            return $this->options;
        }

        // it's not the most beautiful code possible, but making the properties
        // private and the methods public allows to configure the deployment using
        // a config builder and the IDE autocompletion. Here we need to access
        // those private properties and their values
        $options = new ParameterBag();
        $r = new \ReflectionObject($this->config);
        foreach ($r->getProperties() as $property) {
            try {
                $property->setAccessible(true);
                $options->set($property->getName(), $property->getValue($this->config));
            } catch (\ReflectionException $e) {
                // ignore this error
            }
        }

        return $this->options = $options;
    }
}
