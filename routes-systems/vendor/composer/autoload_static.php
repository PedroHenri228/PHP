<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3a27e9e0bd4f816b9f7d8ef2d8f0ba72
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3a27e9e0bd4f816b9f7d8ef2d8f0ba72::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3a27e9e0bd4f816b9f7d8ef2d8f0ba72::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit3a27e9e0bd4f816b9f7d8ef2d8f0ba72::$classMap;

        }, null, ClassLoader::class);
    }
}
