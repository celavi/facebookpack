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
    private $url = 'https://www.facebook.com/prestashop/';
	
	/**
     * @var string
     */
    private $pageName = 'PrestaShop';
	
	/**
	 * @var array
	 */
	private $tabs = array(
		0 => 'timeline'
	);
	
	private $tabsMapping = array(
		'timeline' => 0,
		'events' => 1,
		'messages' => 2
	);
	
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
			'tabs' => Tools::jsonDecode(Configuration::get(self::TABS), true),
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
		if (Tools::getValue('pagePlugin-url') == '') {
			$this->errors[] = $this->module->l('Page Plugin: Invalid Facebook Page URL.');
		}
		// PageName
		if (Tools::getValue('pagePlugin-pageName') == '') {
			$this->errors[] = $this->module->l('Page Plugin: Invalid Facebook Page Name.');
		}
		// Width
		$width = (int)Tools::getValue('pagePlugin-width');
		if ($width <= 0) {
			$this->errors[] = $this->module->l('Page Plugin: Invalid Width.');
		}
		// Height
		$height = (int)Tools::getValue('pagePlugin-height');
		if ($height <= 0) {
			$this->errors[] = $this->module->l('Page Plugin: Invalid Height.');
		}
		// Tabs
		if (Tools::getValue('pagePlugin-tabs') === false) {
			$this->errors[] = $this->module->l('Page Plugin: Check at least one tab to render.');
		}
    }

    private function updateValues()
    {
		Configuration::updateValue(self::ENABLED, (int)Tools::getValue('pagePlugin-enabled'));
		Configuration::updateValue(self::URL, Tools::getValue('pagePlugin-url'));
		Configuration::updateValue(self::PAGENAME, Tools::getValue('pagePlugin-pageName'));
		$tabs = Tools::getValue('pagePlugin-tabs');
		$tabsMapped = array();
		foreach ($tabs as $key => $value) {
			$tabsMappedKey = $this->tabsMapping[$value];
			$tabsMapped[$tabsMappedKey] = $value;
		}
		Configuration::updateValue(self::TABS, Tools::jsonEncode($tabsMapped));
		Configuration::updateValue(self::WIDTH, (int)Tools::getValue('pagePlugin-width'));
		Configuration::updateValue(self::HEIGHT, (int)Tools::getValue('pagePlugin-height'));
		Configuration::updateValue(self::HEADER, (int)Tools::getValue('pagePlugin-header'));
		Configuration::updateValue(self::COVER, (int)Tools::getValue('pagePlugin-cover'));
		Configuration::updateValue(self::ADAPT, (int)Tools::getValue('pagePlugin-adapt'));
		Configuration::updateValue(self::FACES, (int)Tools::getValue('pagePlugin-faces'));
    }

	public function install()
	{
		return Configuration::updateValue(self::ENABLED, $this->enabled) &&
			Configuration::updateValue(self::URL, $this->url) &&
			Configuration::updateValue(self::PAGENAME, $this->pageName) &&
			Configuration::updateValue(self::TABS, Tools::jsonEncode($this->tabs)) &&
            Configuration::updateValue(self::WIDTH, $this->width) &&
			Configuration::updateValue(self::HEIGHT, $this->height) &&
			Configuration::updateValue(self::HEADER, $this->header) &&	
			Configuration::updateValue(self::COVER, $this->cover) &&
			Configuration::updateValue(self::ADAPT, $this->adapt) &&
			Configuration::updateValue(self::FACES, $this->faces);
	}

	public function uninstall()
	{
		return Configuration::deleteByName(self::ENABLED) &&
			Configuration::deleteByName(self::URL) &&
            Configuration::deleteByName(self::PAGENAME) &&
            Configuration::deleteByName(self::TABS) &&
            Configuration::deleteByName(self::WIDTH) &&
            Configuration::deleteByName(self::HEIGHT) &&
            Configuration::deleteByName(self::HEADER) &&
            Configuration::deleteByName(self::COVER) &&
			Configuration::deleteByName(self::ADAPT) &&
			Configuration::deleteByName(self::FACES);
	}
	
	/**
     * @return array
     */
    public function getContentForHook()
    {
		$useSmallHeader = (Configuration::get(self::HEADER) == 1) ? 'true' : 'false';
        $hideCover = (Configuration::get(self::COVER) == 1) ? 'true' : 'false';
		$AdaptWidth = (Configuration::get(self::ADAPT) == 1) ? 'true' : 'false';
		$showFaces = (Configuration::get(self::FACES) == 1) ? 'true' : 'false';
		
		$tabsArray = Tools::jsonDecode(Configuration::get(self::TABS), true);
		$tabs = implode(',', $tabsArray);

        $ret = array(
            'pagePluginUrl' => Configuration::get(self::URL),
			'pagePluginPageName' => Configuration::get(self::PAGENAME),
			'pagePluginTabs' => $tabs,
            'pagePluginWidth' => Configuration::get(self::WIDTH),
            'pagePluginHeight' => Configuration::get(self::HEIGHT),
            'pagePluginSmallHeader' => $useSmallHeader,
			'pagePluginHideCover' => $hideCover,
			'pagePluginAdaptWidth' => $AdaptWidth,
			'pagePluginShowFaces' => $showFaces
        );
		
		return $ret;
	}
}