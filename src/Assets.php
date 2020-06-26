<?php

namespace Whitecube\LaravelPreset;

use \File;

class Assets
{

    public static function install()
    {
        File::ensureDirectoryExists('resources/img');
        File::ensureDirectoryExists('resources/fonts');
        File::ensureDirectoryExists('resources/icons');
        File::ensureDirectoryExists('resources/favicon');
    }

}
