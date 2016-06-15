<?php

require_once __DIR__ . '/Plugin/Abstract.php';

class FbPack_Module extends FbPack_Plugin_Abstract
{
    const NAME = 'facebooksocialplugins';
    const TAB = 'social_networks';
    const AUTHOR = 'Ales Loncar';
    const VERSION = 1.5;

	const DISPLAY_NAME = 'Facebook Social Plugins';
    const DESCRIPTION = 'Facebook Social Plugins for Prestashop: Like Button, Save Button, Share Button, Page Plugin and Commments Plugin.';
	const CONFIRM_UNINSTALL = 'Are you sure you want to uninstall?';

	const FB_SDK = 'v2.6';

    const LOCALE = 'FBPACK_LOCALE';

	/*
	 * @var string
	 */
	private $locale = 'en_US';

	public function getContent()
	{
		$this->errors = array();
        if (Tools::isSubmit('localization-submit')) {
            $this->validateData();
            if (count($this->errors) == 0) {
                // update values
                $this->updateValues();
            }
        }
		
		$ret = array(
			'enablePlugin' => $this->module->l('Enable Plugin'),
            'yes' => $this->module->l('yes'),
            'no' => $this->module->l('no'),
            'socialTitle' => $this->module->l('This module contains Facebook Social Plugins'),
            'socialDescriptionCommon' => $this->module->l('One of the easiest ways to make your online presence more social is by adding Facebook social plugins to your shop. Here you can choose to add five different Facebook social plugins.'),
            'socialDescriptionPlugins' => $this->module->l('Supported plugins: Like Button, Save Button, Share Button, Page Plugin and Comments Plugin.'),
            'settingsUpdated' => $this->module->l('Settings updated'),
			'localizationAndTranslation' => $this->module->l('Localization & Translation'),
			'localizationLabel' => $this->module->l('Localization'),
			'localization' => Tools::getValue('fbPack-locale', Configuration::get(self::LOCALE)),
			'localizationPlaceholder' => 'en_US',
			'localizationDescription'=> $this->module->l("Set appropriate localization used. You can read more about supported Locales and Languages here: <a href='http://developers.facebook.com/docs/internationalization/'>http://developers.facebook.com/docs/internationalization</a>"),
			'localizationSubmit' => $this->module->l("'Localization & Translation' - update settings")
		);
		return $ret;
	}
	
	private function validateData()
    {
		// locale
		if (Tools::getValue('fbPack-locale') == '') {
			$this->errors[] = $this->module->l('Localization & Translation: Invalid Localization.');
		}
    }
	
	private function updateValues()
    {
		Configuration::updateValue(self::LOCALE, Tools::getValue('fbPack-locale'));
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
		return Configuration::get(self::LOCALE);
	}
}
