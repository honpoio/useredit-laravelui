<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitdf52a84358c73f0e2f81e6f7af3a1c30
{
    public static $prefixLengthsPsr4 = array (
        'u' => 
        array (
            'useredit\\laravelui\\' => 19,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'useredit\\laravelui\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitdf52a84358c73f0e2f81e6f7af3a1c30::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitdf52a84358c73f0e2f81e6f7af3a1c30::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}