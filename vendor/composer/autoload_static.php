<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2eab965a2e1b7f25c507debf1fdb2117
{
    public static $files = array (
        '985bd7f13b188f5ae8d08801fddcd229' => __DIR__ . '/../..' . '/inc/universal-functions.php',
        'fe5dd0d0b4da1593c0fa92d0c171cdd3' => __DIR__ . '/../..' . '/inc/Admin/admin-init.php',
    );

    public static $prefixLengthsPsr4 = array (
        'I' => 
        array (
            'Inc\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Inc\\' => 
        array (
            0 => __DIR__ . '/../..' . '/inc',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2eab965a2e1b7f25c507debf1fdb2117::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2eab965a2e1b7f25c507debf1fdb2117::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}