<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2896b13dfb3ca723a34ccbb818a1d540
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Sonata\\GoogleAuthenticator\\' => 27,
        ),
        'R' => 
        array (
            'RobThree\\Auth\\' => 14,
        ),
        'G' => 
        array (
            'Google\\Authenticator\\' => 21,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Sonata\\GoogleAuthenticator\\' => 
        array (
            0 => __DIR__ . '/..' . '/sonata-project/google-authenticator/src',
        ),
        'RobThree\\Auth\\' => 
        array (
            0 => __DIR__ . '/..' . '/robthree/twofactorauth/lib',
        ),
        'Google\\Authenticator\\' => 
        array (
            0 => __DIR__ . '/..' . '/sonata-project/google-authenticator/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2896b13dfb3ca723a34ccbb818a1d540::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2896b13dfb3ca723a34ccbb818a1d540::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit2896b13dfb3ca723a34ccbb818a1d540::$classMap;

        }, null, ClassLoader::class);
    }
}