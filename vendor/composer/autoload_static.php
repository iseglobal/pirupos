<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitfbb45736842fe93e5b98d14238f1eaaf
{
    public static $prefixLengthsPsr4 = array (
        'N' => 
        array (
            'NumberToWords\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'NumberToWords\\' => 
        array (
            0 => __DIR__ . '/..' . '/kwn/number-to-words/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitfbb45736842fe93e5b98d14238f1eaaf::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitfbb45736842fe93e5b98d14238f1eaaf::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitfbb45736842fe93e5b98d14238f1eaaf::$classMap;

        }, null, ClassLoader::class);
    }
}
