<?php

class View
{
    private static $smarty;

    private function __construct() {}

    public static function getInstance(): Smarty
    {
        if (self::$smarty) {
            return self::$smarty;
        }

        $smarty = new Smarty();
        $smarty->setTemplateDir('Views');

        return self::$smarty = $smarty;
    }
}