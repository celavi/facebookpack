<?php

require_once __DIR__ . '/Abstract.php';

class FbPack_Plugin_SaveButton extends FbPack_Plugin_Abstract
{
	const ENABLED	= 'FBPACK_SAVE_BUTTON_ENABLED';
    const URL       = 'FBPACK_SAVE_BUTTON_URL';
    const SIZE		= 'FBPACK_SAVE_BUTTON_SIZE';
	
	/**
     * @var string
     */
    private $url = '';

    /**
     * @var string
     */
    private $size = 'large';
	
	public function getContent()
	{
		$this->errors = array();
        if (Tools::isSubmit('saveButton-submit')) {
            if (count($this->errors) == 0) {
                // update values
                $this->updateValues();
            }
        }
		
		$ret = array(
            'name' => $this->module->l('Save Button'),
            'enabled' => Tools::getValue('saveButton-enabled', Configuration::get(self::ENABLED)),
            'description' => $this->module->l("Check the checbox to enable 'Save Button'"),
            'urlLabel' => $this->module->l('Link to save'),
            'url' => Tools::getValue('saveButton-url', Configuration::get(self::URL)),
            'urlPlaceholder' => $this->module->l('Product catalog URI or web URL. Defaults to the current link/address.'),
			'sizeLabel' => $this->module->l('Button Size'),
			'size' => Tools::getValue('saveButton-size', Configuration::get(self::SIZE)),
			'sizeSmall' => $this->module->l('small'),
			'sizeLarge' => $this->module->l('large'),
			'sizeDescription' => $this->module->l('Determines the size of the button'),
            'submit' => $this->module->l("'Save Button' - update settings")
        );

        return $ret;
	}
	
	private function updateValues()
    {
        Configuration::updateValue(self::ENABLED, (int)Tools::getValue('saveButton-enabled'));
        Configuration::updateValue(self::URL, Tools::getValue('saveButton-url'));
        Configuration::updateValue(self::SIZE, Tools::getValue('saveButton-size'));
    }

	public function install()
	{
		if (!Configuration::updateValue(self::ENABLED, $this->enabled) or
            !Configuration::updateValue(self::URL, $this->url) or
            !Configuration::updateValue(self::SIZE, $this->size)) {
            return false;
        }

        return true;
	}

	public function uninstall() 
	{
		if (!Configuration::deleteByName(self::ENABLED) or
            !Configuration::deleteByName(self::URL) or
            !Configuration::deleteByName(self::SIZE)) {
            return false;
        }
		
		return true;
	}
	
	/**
     * @return array
     */
    public function getContentForHook()
    {
        $ret = array(
            'saveButtonUrl' => Configuration::get(self::URL),
            'saveButtonSize' => Configuration::get(self::SIZE)
        );

        return $ret;
    }
}

