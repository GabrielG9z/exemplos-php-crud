<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb2685a7f1a6add3e4f3cf99c92948520
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'CrudPoo\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'CrudPoo\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitb2685a7f1a6add3e4f3cf99c92948520::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb2685a7f1a6add3e4f3cf99c92948520::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb2685a7f1a6add3e4f3cf99c92948520::$classMap;

        }, null, ClassLoader::class);
    }
}
