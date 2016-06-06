<?php

require_once __DIR__ . '/Interface.php';

abstract class FbPack_Plugin_Abstract implements FbPack_Plugin_Interface
{
    /**
     * @var array
     */
    protected $errors = array();

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }

    public function isEnabled()
    {
        return false;
    }

    public function getContentForHook()
    {
        return array();
    }
}
