<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit81d2411583be659f59deb302a2826697
{
    public static $prefixLengthsPsr4 = array (
        'E' => 
        array (
            'EasyRdf\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'EasyRdf\\' => 
        array (
            0 => __DIR__ . '/..' . '/easyrdf/easyrdf/lib',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit81d2411583be659f59deb302a2826697::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit81d2411583be659f59deb302a2826697::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit81d2411583be659f59deb302a2826697::$classMap;

        }, null, ClassLoader::class);
    }
}
