<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit374fcc6d555a99ca81edcefe64bf7a1e
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit374fcc6d555a99ca81edcefe64bf7a1e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit374fcc6d555a99ca81edcefe64bf7a1e::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
