<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5ae07436b8100bfcd46d672b6f21aaa2
{
    public static $prefixLengthsPsr4 = array (
        'J' => 
        array (
            'Juan\\Sdn\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Juan\\Sdn\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5ae07436b8100bfcd46d672b6f21aaa2::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5ae07436b8100bfcd46d672b6f21aaa2::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit5ae07436b8100bfcd46d672b6f21aaa2::$classMap;

        }, null, ClassLoader::class);
    }
}
