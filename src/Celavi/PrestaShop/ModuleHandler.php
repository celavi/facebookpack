<?php

namespace Celavi\PrestaShop;

class ModuleHandler
{
    /**
     * @var ConsoleLogger
     */
    protected static $instance = null;

    /**
     * @var \Monolog\Logger
     */
    protected $logger = null;

    /**
     * @var Twig_Environment
     */
    protected $template = null;

    /**
     * Returns the ConsoleLogger instance of this class.
     *
     * @return ConsoleLogger
     */
    public static function getInstance()
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Returns the PHP Console Logger.
     *
     * @return \Monolog\Logger
     */
    public function getLogger()
    {
        if (null === $this->logger) {
            $this->logger = new \Monolog\Logger('all', array(new \Monolog\Handler\PHPConsoleHandler()));
            \Monolog\ErrorHandler::register($this->logger);
        }

        return $this->logger;
    }

    /**
     * Returns Twig Template Engine.
     *
     * @return Twig_Environment
     */
    public function getTemplate()
    {
        if (null === $this->template) {
            $baseDir = dirname(dirname(dirname(__DIR__)));
            $loader = new \Twig_Loader_Filesystem($baseDir.'/twig/templates');
            $template = new \Twig_Environment($loader, array(
                'cache' => $baseDir . '/twig/compilation_cache'
            ));
            $this->template = $template;
        }

        return $this->template;
    }

    /**
     * Singleton pattern implementation makes "new" unavailable.
     */
    protected function __construct()
    {
    }

    /**
     * Private clone method to prevent cloning of the instance of the
     * *Singleton* instance.
     */
    protected function __clone()
    {
    }

    /**
     * Private unserialize method to prevent unserializing of the *Singleton*
     * instance.
     */
    protected function __wakeup()
    {
    }
}
