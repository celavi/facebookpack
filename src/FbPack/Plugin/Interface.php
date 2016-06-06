<?php

interface FbPack_Plugin_Interface
{
    /**
     * @var Module
     */
    public function __construct($prestaModule);

    /**
     * Get Content
     *
     * @return array
     */
    public function getContent();

    /**
     * Get Content For Hook
     *
     * @return array
     */
    public function getContentForHook();

    /**
     * @return boolean
     */
    public function install();

    /**
     * @return boolean
     */
    public function uninstall();

    /**
     * @return array
     */
    public function getErrors();

    /**
     * @return boolean
     */
    public function isEnabled();
}
