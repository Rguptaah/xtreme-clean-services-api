<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita0c00e855d01188c5fb63ee290226a0b
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Firebase\\JWT\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Firebase\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/firebase/php-jwt/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita0c00e855d01188c5fb63ee290226a0b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita0c00e855d01188c5fb63ee290226a0b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInita0c00e855d01188c5fb63ee290226a0b::$classMap;

        }, null, ClassLoader::class);
    }
}