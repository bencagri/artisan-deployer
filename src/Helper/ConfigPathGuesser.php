<?php

namespace Bencagri\Artisan\Deployer\Helper;


class ConfigPathGuesser
{
    private const LEGACY_CONFIG_DIR = '%s/config';
    private const CONFIG_DIR = '%s/etc';

    public static function guess(string $projectDir, string $stage): string
    {
        if (is_dir($configDir = sprintf(self::CONFIG_DIR, $projectDir))) {
            return sprintf('%s/%s/deploy.php', $configDir, $stage);
        }

        if (is_dir($configDir = sprintf(self::LEGACY_CONFIG_DIR, $projectDir))) {
            return sprintf('%s/deploy_%s.php', $configDir, $stage);
        }

        throw new \RuntimeException(sprintf('None of the usual Laravel config dirs exist in the application. Create one of these dirs before continuing: "%s" or "%s".', self::CONFIG_DIR, self::LEGACY_CONFIG_DIR));
    }
}
