<?php

namespace Celavi\PrestaShop\FbPack;

class ModuleFactory
{
        public static function create($plugin)
        {
            // construct our class name and check its existence
            $class = 'Celavi\PrestaShop\FbPack\\' . $plugin;
            if (class_exists($classname)) {
                // return a new Module object
                return new $class;
            }

            // otherwise we fail
            throw new \RuntimeException('Unsupported plugin = ' . $plugin);
        }

}
