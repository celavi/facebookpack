<?php

require_once __DIR__ . '/Abstract.php';

class FbPack_Plugin_CommentsPlugin extends FbPack_Plugin_Abstract
{
	const ENABLED		= 'FBPACK_COMMENTS_PLUGIN_ENABLED';
    const URL			= 'FBPACK_COMMENTS_PLUGIN_URL';
    const WIDTH			= 'FBPACK_COMMENTS_PLUGIN_WIDTH';
	const NUMPOSTS		= 'FBPACK_COMMENTS_PLUGIN_NUMPOSTS';
	const COLORSCHEME   = 'FBPACK_COMMENTS_PLUGIN_COLORSCH';
	
	/**
     * @var string
     */
    private $url = '';

    /**
     * @var integer
     */
    private $width = 530;
	
	/**
	 * @var integer
	 */
	private $numPosts = 10;
	
	/**
     * @var string
     */
    private $colorscheme = 'light';
	
	public function getContent()
	{
		$this->errors = array();
        if (Tools::isSubmit('commentsPlugin-submit')) {
            $this->validateData();
            if (count($this->errors) == 0) {
                // update values
                $this->updateValues();
            }
        }
		
		$ret = array(
            'name' => $this->module->l('Comments Plugin'),
            'enabled' => Tools::getValue('commentsPlugin-enabled', Configuration::get(self::ENABLED)),
            'description' => $this->module->l("Check the checbox to enable 'Comments Plugin'"),
            'urlLabel' => $this->module->l('URL to comment on'),
            'url' => Tools::getValue('commentsPlugin-url', Configuration::get(self::URL)),
            'urlPlaceholder' => $this->module->l('The URL that this comments box is associated with. Defaults to the current URL.'),
			'widthLabel' => $this->module->l('Width'),
            'width' => Tools::getValue('commentsPlugin-width', Configuration::get(self::WIDTH)),
            'widthPlaceholder' => $this->module->l('The pixel width of the plugin'),
            'widthDescription' => $this->module->l('Width in pixels'),
			'numPostsLabel' => $this->module->l('Number of Posts'),
            'numPosts' => Tools::getValue('commentsPlugin-numPosts', Configuration::get(self::NUMPOSTS)),
            'numPostsPlaceholder' => $this->module->l('The number of posts to display by default'),
            'numPostsDescription' => $this->module->l('The number of comments to show by default. The minimum value is 1.'),
			'colorschemeLabel' => $this->module->l('Color Scheme'),
            'colorscheme' => Tools::getValue('commentsPlugin-colorscheme', Configuration::get(self::COLORSCHEME)),
            'colorschemeLight' => $this->module->l('Light'),
            'colorschemeDark' => $this->module->l('Dark'),
            'colorschemeDescription' => $this->module->l('The color scheme used by the comments plugin. Can be "light" or "dark".'),
            'submit' => $this->module->l("'Comments Plugin' - update settings")
        );

        return $ret;
	}
	
	private function validateData()
    {
		// Width
		$width = (int)Tools::getValue('commentsPlugin-width');
		if ($width <= 0) {
			$this->errors[] = $this->module->l('Comments Plugin: Invalid Width.');
		}
		// Height
		$numPosts = (int)Tools::getValue('commentsPlugin-numPosts');
		if ($numPosts <= 0 || $numPosts > 20) {
			$this->errors[] = $this->module->l('Comments Plugin: Invalid number of posts. Should be between 1 and 20.');
		}
    }
	
	private function updateValues()
    {
        Configuration::updateValue(self::ENABLED, (int)Tools::getValue('commentsPlugin-enabled'));
        Configuration::updateValue(self::URL, Tools::getValue('commentsPlugin-url'));
        Configuration::updateValue(self::WIDTH, (int)Tools::getValue('commentsPlugin-width'));
		Configuration::updateValue(self::NUMPOSTS, (int)Tools::getValue('commentsPlugin-numPosts'));
        Configuration::updateValue(self::COLORSCHEME, Tools::getValue('commentsPlugin-colorscheme'));
    }

	public function install()
	{
		if (!Configuration::updateValue(self::ENABLED, $this->enabled) or
            !Configuration::updateValue(self::URL, $this->url) or
            !Configuration::updateValue(self::WIDTH, $this->width) or
			!Configuration::updateValue(self::NUMPOSTS, $this->numPosts) or 
			!Configuration::updateValue(self::COLORSCHEME, $this->colorscheme)) {
            return false;
        }
		
		return true;
	}

	public function uninstall()
	{
		if (!Configuration::deleteByName(self::ENABLED) or
            !Configuration::deleteByName(self::URL) or
            !Configuration::deleteByName(self::WIDTH) or
			!Configuration::deleteByName(self::NUMPOSTS) or
			!Configuration::deleteByName(self::COLORSCHEME)) {
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
            'commentsPluginUrl' => Configuration::get(self::URL),
            'commentsPluginWidth' => Configuration::get(self::WIDTH),
			'commentsPluginNumPosts' => Configuration::get(self::NUMPOSTS),
            'commentsPluginColorscheme' => Configuration::get(self::COLORSCHEME)
        );

        return $ret;
    }
}

