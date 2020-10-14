<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2d52148caa6fbf85422bc6ef887ae53e
{
    public static $prefixLengthsPsr4 = array (
        'O' => 
        array (
            'OrlovAleksander\\Horoscopeparser\\' => 32,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'OrlovAleksander\\Horoscopeparser\\' => 
        array (
            0 => __DIR__ . '/../..' . '/packages/orlovaleksandr/horoscopeparser/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2d52148caa6fbf85422bc6ef887ae53e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2d52148caa6fbf85422bc6ef887ae53e::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
