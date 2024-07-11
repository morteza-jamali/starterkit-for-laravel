<?php

namespace Xmen\StarterKit;

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Str;

/**
 * @see \Xmen\StarterKit\StarterKit
 */
class StarterKitFacade extends Facade
{
    public static $scripts=[];
    public static $styles=[];

    protected static function getFacadeAccessor()
    {
        return 'starterkit';
    }

    /**
     * @deprecated Instead use Str::slug()
     */
    public static function slug($name, $replace_char = '-') {
        return Str::slug($name, $replace_char);
    }

    /**
     * Get all of the additional scripts that should be registered.
     *
     * @return array
     */
    public static function allScripts()
    {
        return static::$scripts;
    }

    /**
     * Get all of the additional stylesheets that should be registered.
     *
     * @return array
     */
    public static function allStyles()
    {
        return static::$styles;
    }

    /**
     * Register the given script file with Starter-Kit.
     *
     * @param  string  $name
     * @param  string  $path
     * @return static
     */
    public static function script($name, $path)
    {
        static::$scripts[$name] = $path;

        return new static;
    }

    /**
     * Register the given CSS file with Starter-Kit.
     *
     * @param  string  $name
     * @param  string  $path
     * @return static
     */
    public static function style($name, $path)
    {
        static::$styles[$name] = $path;

        return new static;
    }}
