<?php

class FbPack_Module
{
    const NAME = 'facebookpack';
    const TAB = 'social_networks';
    const AUTHOR = 'Ales Loncar';
    const VERSION = 1.4;
	
	const DISPLAY_NAME = 'Facebook Pack';
    const DESCRIPTION = 'Facebook Pack contains Facebook Social Plugins: Like Button, Like Box, Login Button, Facebook Comments';
	const CONFIRM_UNINSTALL = 'Are you sure you want to uninstall?';
		
	const FB_SDK = 'v2.3';
	
	/**
     * @var Module
     */
    private $module = null;
	
	/**
	 * 
	 * @var string
	 */
	private $locale = 'en_US';
	
	/**
	 * 
	 * @param Module $prestaModule
	 */
	public function __construct($prestaModule)
    {
        if ($this->module === null) {
            $this->module = $prestaModule;
        }
    }
    
	public function getContent()
	{
		$ret = array(
			'enablePlugin' => $this->module->l('Enable Plugin'),
            'yes' => $this->module->l('yes'),
            'no' => $this->module->l('no'),
            'socialTitle' => $this->module->l('This module contains Facebook Social Plugins'),
            'socialDescriptionCommon' => $this->module->l('One of the easiest ways to make your online presence more social is by adding Facebook social plugins to your shop. Here you can choose to add four different Facebook social plugins.'),
            'socialDescriptionSimple' => $this->module->l('Two simple plugins: Like Button, Like Box.'),
            'socialDescriptionComplex' => $this->module->l('Two plugins requires Facebook Connect to work properly: Comments and Login Button.'),
		);
		return $ret;
	}
	
	/**
	 * 
	 * @return string
	 */
	public function getLocale()
	{
		return $this->locale;
	}
}
