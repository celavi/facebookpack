<?php

require_once __DIR__ . '/Plugin/Abstract.php';

class FbPack_Module extends FbPack_Plugin_Abstract
{
    const NAME = 'facebookpack';
    const TAB = 'social_networks';
    const AUTHOR = 'Ales Loncar';
    const VERSION = 1.4;

	const DISPLAY_NAME = 'Facebook Pack';
    const DESCRIPTION = 'Facebook Pack contains Facebook Social Plugins: Like Button, Like Box, Login Button, Facebook Comments';
	const CONFIRM_UNINSTALL = 'Are you sure you want to uninstall?';

	const FB_SDK = 'v2.3';

    const LOCALE = 'FBPACK_LOCALE';

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
            'settingsUpdated' => $this->module->l('Settings updated')
		);
		return $ret;
	}

    /**
     * @return boolean
     */
    public function install()
    {
        if (!Configuration::updateValue(self::LOCALE, $this->locale)) {
            return false;
        }

        return true;
    }

    /**
     * @return boolean
     */
    public function uninstall()
    {
        if (!Configuration::deleteByName(self::LOCALE)) {
            return false;
        }

        return true;
    }

	/**
	 *
	 * @return string
	 */
	public function getLocale()
	{
		return Tools::getValue('fbPack-locale', Configuration::get(self::LOCALE));
	}
}
