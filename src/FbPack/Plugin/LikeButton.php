<?php

class FbPack_Plugin_LikeButton
{
    /**
     * @var Module
     */
    private $module = null;

    /**
     * @var integer
     */
    private $enabled = 0;

    /**
     * @var string
     */
    private $url = '';

	/**
	 * @var integer
	 */
	private $width = 300;

	/**
	 * @var string
	 */
	private $layout = 'standard';

	/**
	 * @var string
	 */
	private $action = 'like';

    /**
     * @var integer
     */
    private $faces = 0;

    /**
     * @var integer
     */
    private $share = 0;

    /**
     * @var string
     */
    private $colorscheme = 'light';

    public function __construct($prestaModule)
    {
        if ($this->module === null) {
            $this->module = $prestaModule;
        }
    }

	/**
	 * Get Content for Module config
	 *
	 * @return array
	 */
    public function getContent()
    {
        $ret = array(
            'name' => $this->module->l('Like Button'),
            'enabled' => $this->enabled,
            'description' => $this->module->l("Check the checbox to enable 'Like Button'"),
            'urlLabel' => $this->module->l('URL to Like'),
            'url' => $this->url,
            'urlPlaceholder' => $this->module->l('The URL to like. Defaults to the current page'),
			'widthLabel' => $this->module->l('Width'),
			'width' => $this->width,
			'widthPlaceholder' => $this->module->l('The pixel width of the plugin'),
			'widthDescription' => $this->module->l('Width in pixels'),
			'layoutLabel' => $this->module->l('Layout'),
			'layout' => $this->layout,
			'layoutStandard' => $this->module->l('Standard'),
			'layoutBoxCount' => $this->module->l('Box (Count)'),
			'layoutButtonCount' => $this->module->l('Button (Count)'),
			'layoutButton' => $this->module->l('Button'),
			'layoutDescription' => $this->module->l('Determines the size and amount of social context next to the button'),
			'actionLabel' => $this->module->l('Action Type'),
			'action' => $this->action,
			'actionLike' => $this->module->l('Like'),
			'actionRecommend' => $this->module->l('Recommend'),
			'actionDescription' => $this->module->l('The verb to display in the button'),
            'facesLabel' => $this->module->l("Show Friends' Faces"),
            'faces' => $this->faces,
            'facesDescription' => $this->module->l('Check the checkbox to display profile photos below the button (standard layout only)'),
            'shareLabel' => $this->module->l('Include Share Button'),
            'share' => $this->share,
            'shareDescription' => $this->module->l('Check the checkbox to include a share button beside the Like button'),
            'colorschemeLabel' => $this->module->l('Color Scheme'),
            'colorscheme' => $this->colorscheme,
            'colorschemeLight' => $this->module->l('Light'),
            'colorschemeDark' => $this->module->l('Dark'),
            'colorschemeDescription' => $this->module->l('The color scheme used by the plugin for any text outside of the button itself'),
            'submit' => $this->module->l("'Like Button' - update settings")
        );

        return $ret;
    }
}
