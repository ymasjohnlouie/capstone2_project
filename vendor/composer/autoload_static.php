<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd46bb966d107be9085c9238ccafdab9d
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitd46bb966d107be9085c9238ccafdab9d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd46bb966d107be9085c9238ccafdab9d::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
