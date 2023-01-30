<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbe895932555d89a6c1e5e7897e749980
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'Layerdrops\\Polimark\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Layerdrops\\Polimark\\' => 
        array (
            0 => __DIR__ . '/../..' . '/includes',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbe895932555d89a6c1e5e7897e749980::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbe895932555d89a6c1e5e7897e749980::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
