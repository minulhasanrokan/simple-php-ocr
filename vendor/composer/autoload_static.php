<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf958d496de1f94d4a19dfdd5b0d3384b
{
    public static $prefixLengthsPsr4 = array (
        't' => 
        array (
            'thiagoalessio\\TesseractOCR\\' => 27,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'thiagoalessio\\TesseractOCR\\' => 
        array (
            0 => __DIR__ . '/..' . '/thiagoalessio/tesseract_ocr/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf958d496de1f94d4a19dfdd5b0d3384b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf958d496de1f94d4a19dfdd5b0d3384b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf958d496de1f94d4a19dfdd5b0d3384b::$classMap;

        }, null, ClassLoader::class);
    }
}
