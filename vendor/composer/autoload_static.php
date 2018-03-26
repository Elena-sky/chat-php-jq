<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit379f5255d2bd4900a9e5d70aa4da83ed
{
    public static $prefixesPsr0 = array (
        'R' => 
        array (
            'RelativeTime' => 
            array (
                0 => __DIR__ . '/..' . '/mpratt/relativetime/Lib',
            ),
        ),
        'J' => 
        array (
            'JamesMoss\\Flywheel\\' => 
            array (
                0 => __DIR__ . '/..' . '/jamesmoss/flywheel/src',
                1 => __DIR__ . '/..' . '/jamesmoss/flywheel/test',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInit379f5255d2bd4900a9e5d70aa4da83ed::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}