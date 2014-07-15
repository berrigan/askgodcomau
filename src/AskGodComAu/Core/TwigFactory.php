<?php namespace AskGodComAu\Core;

class TwigFactory
{
    public static function getTwig()
    {
        $loader = new \Twig_Loader_Filesystem(ROOTDIR . '/views');

        return new \Twig_Environment($loader, array('debug' => true,
            'autoescape' => true,
            'auto_reload' => true));
    }
}