<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2e2b0529f56e92665207effd55d7a7ea
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit2e2b0529f56e92665207effd55d7a7ea::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2e2b0529f56e92665207effd55d7a7ea::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit2e2b0529f56e92665207effd55d7a7ea::$classMap;

        }, null, ClassLoader::class);
    }
}