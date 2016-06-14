<?php

require_once __DIR__ . '/Abstract.php';

class FbPack_Plugin_ShareButton extends FbPack_Plugin_Abstract
{
	const ENABLED	= 'FBPACK_SHARE_BUTTON_ENABLED';
    const URL       = 'FBPACK_SHARE_BUTTON_URL';
    const LAYOUT	= 'FBPACK_SHARE_BUTTON_LAYOUT';
	const MOBILE	= 'FBPACK_SHARE_BUTTON_MOBILE';
	
	/**
     * @var string
     */
    private $url = '';

    /**
     * @var string
     */
    private $layout = 'icon_link';
	
	/**
	 * @var int 
	 */
	private $mobile = 0;
	
	/**
	 * @return array
	 */
	public function getContent()
	{
		$this->errors = array();
        if (Tools::isSubmit('shareButton-submit')) {
            if (count($this->errors) == 0) {
                // update values
                $this->updateValues();
            }
        }
		
		$ret = array(
            'name' => $this->module->l('Share Button'),
            'enabled' => Tools::getValue('shareButton-enabled', Configuration::get(self::ENABLED)),
            'description' => $this->module->l("Check the checbox to enable 'Share Button'"),
            'urlLabel' => $this->module->l('URL to share'),
            'url' => Tools::getValue('shareButton-url', Configuration::get(self::URL)),
            'urlPlaceholder' => $this->module->l('URL used with the Share Button. Defaults to the current URL.'),
			'layoutLabel' => $this->module->l('Layout'),
			'layout' => Tools::getValue('shareButton-layout', Configuration::get(self::LAYOUT)),
			'layoutBoxCount' => $this->module->l('Box (Count)'),
			'layoutButtonCount' => $this->module->l('Button (Count)'),
			'layoutButton' => $this->module->l('Button'),
			'layoutLink' => $this->module->l('Link'),
			'layoutIconLink' => $this->module->l('Icon with Link'),
			'layoutIcon' => $this->module->l('Icon'),
			'layoutDescription' => $this->module->l('Select one of the different layouts that are available for the plugin.'),
			'mobileLabel' => $this->module->l('Mobile Iframe'),
			'mobile' => Tools::getValue('shareButton-mobile', Configuration::get(self::MOBILE)),
			'mobileDescription' => $this->module->l('Shows the share dialog in an iframe on mobile'),
            'submit' => $this->module->l("'Share Button' - update settings")
        );

        return $ret;
	}
	
	private function updateValues()
    {
        Configuration::updateValue(self::ENABLED, (int)Tools::getValue('shareButton-enabled'));
        Configuration::updateValue(self::URL, Tools::getValue('shareButton-url'));
        Configuration::updateValue(self::LAYOUT, Tools::getValue('shareButton-layout'));
		Configuration::updateValue(self::MOBILE, (int)Tools::getValue('shareButton-mobile'));
    }
	
	public function install()
	{
		if (!Configuration::updateValue(self::ENABLED, $this->enabled) or
            !Configuration::updateValue(self::URL, $this->url) or
            !Configuration::updateValue(self::LAYOUT, $this->layout) or
			!Configuration::updateValue(self::MOBILE, $this->mobile)) {
            return false;
        }

        return true;
	}

	public function uninstall()
	{
		if (!Configuration::deleteByName(self::ENABLED) or
            !Configuration::deleteByName(self::URL) or
            !Configuration::deleteByName(self::LAYOUT) or
			!Configuration::deleteByName(self::MOBILE)) {
            return false;
        }
		
		return true;
	}
	
	/**
     * @return array
     */
    public function getContentForHook()
    {
        $mobileIframe = (Configuration::get(self::MOBILE) == 1) ? 'true' : 'false';

        $ret = array(
            'shareButtonUrl' => Configuration::get(self::URL),
            'shareButtonLayout' => Configuration::get(self::LAYOUT),
            'shareButtonMobile' => $mobileIframe,
            'shareButtonShare' => $this->module->l("Share")
        );

        return $ret;
    }
}

