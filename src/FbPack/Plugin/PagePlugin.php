<?php

require_once __DIR__ . '/Abstract.php';

class FbPack_Plugin_PagePlugin extends FbPack_Plugin_Abstract
{
	const ENABLED	= 'FBPACK_PAGE_PLUGIN_ENABLED';
	const URL       = 'FBPACK_PAGE_PLUGIN_URL';
	const PAGENAME	= 'FBPACK_PAGE_PLUGIN_PAGENAME';
	const TABS		= 'FBPACK_PAGE_PLUGIN_TABS';
	const WIDTH		= 'FBPACK_PAGE_PLUGIN_WIDTH';
	const HEIGHT	= 'FBPACK_PAGE_PLUGIN_HEIGHT';
	const HEADER	= 'FBPACK_PAGE_PLUGIN_HEADER';
	const COVER		= 'FBPACK_PAGE_PLUGIN_COVER';
	const ADAPT		= 'FBPACK_PAGE_PLUGIN_ADAPT';
	const FACES		= 'FBPACK_PAGE_PLUGIN_FACES';
	
	/**
     * @var string
     */
    private $url = 'http://www.facebook.com/prestashop/';
	
	/**
     * @var string
     */
    private $pageName = 'PrestaShop';
	
	/**
	 * @var array
	 */
	private $tabs = array('timeline');
	
	/**
     * @var integer
     */
    private $width = 180;
	
	/**
	 * @var integer
	 */
	private $height = 70;
	
	/**
     * @var integer
     */
    private $header = 0;
	
	/**
     * @var integer
     */
    private $cover = 0;
	
	/**
     * @var integer
     */
    private $adapt = 1;
	
	/**
     * @var integer
     */
    private $faces = 1;
	
	public function getContent()
	{
		$this->errors = array();
        if (Tools::isSubmit('pagePlugin-submit')) {
            $this->validateData();
            if (count($this->errors) == 0) {
                // update values
                $this->updateValues();
            }
        }
		
		$ret = array(
            'name' => $this->module->l('Page Plugin'),
            'enabled' => Tools::getValue('pagePlugin-enabled', Configuration::get(self::ENABLED)),
			'description' => $this->module->l("Check the checbox to enable 'Page Plugin'"),
			'urlLabel' => $this->module->l('Facebook Page URL'),
			'url' => Tools::getValue('pagePlugin-url', Configuration::get(self::URL)),
			'urlPlaceholder' => $this->module->l('The URL of the Facebook Page'),
			'pageNameLabel' => $this->module->l('Facebook Page Name'),
			'pageName' => Tools::getValue('pagePlugin-pageName', Configuration::get(self::PAGENAME)),
			'pageNamePlaceholder' => $this->module->l('The Name of the Facebook Page'),
			'tabsLabel' => $this->module->l('Tabs'),
			'tabsTimeline' => $this->module->l('timeline'),
			'tabsEvents' => $this->module->l('events'),
			'tabsMessages' => $this->module->l('messages'),
			'tabsDescription' => $this->module->l('Check which tabs to render'),
			'widthLabel' => $this->module->l('Width'),
			'width' => Tools::getValue('pagePlugin-width', Configuration::get(self::WIDTH)),
			'widthPlaceholder' => $this->module->l('The pixel width of the embed (Min. 180 to Max. 500)'),
			'widthDescription' => $this->module->l('Width in pixels'),
			'heightLabel' => $this->module->l('Height'),
			'height' => Tools::getValue('pagePlugin-height', Configuration::get(self::HEIGHT)),
			'heightPlaceholder' => $this->module->l('The pixel height of the embed (Min. 70)'),
			'heightDescription' => $this->module->l('Height in pixels'),
			'headerLabel' => $this->module->l('Use Small Header'),
			'header' => Tools::getValue('pagePlugin-header', Configuration::get(self::HEADER)),
			'headerDescription' => $this->module->l('Use the small header instead'),
			'coverLabel' => $this->module->l('Hide Cover Photo'),
			'cover' => Tools::getValue('pagePlugin-cover', Configuration::get(self::COVER)),
			'coverDescription' => $this->module->l('Hide cover photo in the header'),
			'adaptLabel' => $this->module->l('Adapt to plugin container width'),
			'adapt' => Tools::getValue('pagePlugin-adapt', Configuration::get(self::ADAPT)),
			'adaptDescription' => $this->module->l('Try to fit inside the container width'),
			'facesLabel' => $this->module->l("Show Friend's Faces"),
			'faces' => Tools::getValue('pagePlugin-faces', Configuration::get(self::FACES)),
			'facesDescription' => $this->module->l('Show profile photos when friends like this'),
            'submit' => $this->module->l("'Page Plugin' - update settings")
        );
		
		return $ret;
	}
	
	private function validateData()
    {
		// URL
		// PageName
        // Width
		// Height
		// Tabs
    }

    private function updateValues()
    {
        var_dump(Tools::getValue('pagePlugin-tabs'));
    }

	public function install()
	{
		if (!Configuration::updateValue(self::ENABLED, $this->enabled) or
            !Configuration::updateValue(self::URL, $this->url) or
			!Configuration::updateValue(self::PAGENAME, $this->pageName) or
			!Configuration::updateValue(self::TABS, $this->tabse) or
            !Configuration::updateValue(self::WIDTH, $this->width) or
			!Configuration::updateValue(self::HEIGHT, $this->height) or
			!Configuration::updateValue(self::HEADER, $this->header) or	
			!Configuration::updateValue(self::COVER, $this->cover) or
			!Configuration::updateValue(self::ADAPT, $this->adapt) or
			!Configuration::updateValue(self::FACES, $this->faces) ) {
            return false;
        }

        return true;
	}

	public function uninstall()
	{
		if (!Configuration::deleteByName(self::ENABLED) or
            !Configuration::deleteByName(self::URL) or
            !Configuration::deleteByName(self::PAGENAME) or
            !Configuration::deleteByName(self::TABS) or
            !Configuration::deleteByName(self::WIDTH) or
            !Configuration::deleteByName(self::HEIGHT) or
            !Configuration::deleteByName(self::HEADER) or
            !Configuration::deleteByName(self::COVER) or
			!Configuration::deleteByName(self::ADAPT) or
			!Configuration::deleteByName(self::FACES)) {
            return false;
        }

        return true;
	}
}