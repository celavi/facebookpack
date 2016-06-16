<?php

require_once __DIR__ . '/Abstract.php';

class FbPack_Plugin_LikeButton extends FbPack_Plugin_Abstract
{
    const ENABLED       = 'FBPACK_LIKE_BUTTON_ENABLED';
    const URL           = 'FBPACK_LIKE_BUTTON_URL';
    const WIDTH         = 'FBPACK_LIKE_BUTTON_WIDTH';
    const LAYOUT        = 'FBPACK_LIKE_BUTTON_LAYOUT';
    const ACTION        = 'FBPACK_LIKE_BUTTON_ACTION';
    const FACES         = 'FBPACK_LIKE_BUTTON_FACES';
    const SHARE         = 'FBPACK_LIKE_BUTTON_SHARE';
    const COLORSCHEME   = 'FBPACK_LIKE_BUTTON_COLORSCHEME';

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

    /**
     * Get Content for Module config
     *
     * @return array
     */
    public function getContent()
    {
        $this->errors = array();
        if (Tools::isSubmit('likeButton-submit')) {
            $this->validateData();
            if (count($this->errors) == 0) {
                // update values
                $this->updateValues();
            }
        }
        $ret = array(
            'name' => $this->module->l('Like Button'),
            'enabled' => Tools::getValue('likeButton-enabled', Configuration::get(self::ENABLED)),
            'description' => $this->module->l("Check the checbox to enable 'Like Button'"),
            'urlLabel' => $this->module->l('URL to Like'),
            'url' => Tools::getValue('likeButton-url', Configuration::get(self::URL)),
            'urlPlaceholder' => $this->module->l('The URL to like. Defaults to the current page'),
            'widthLabel' => $this->module->l('Width'),
            'width' => Tools::getValue('likeButton-width', Configuration::get(self::WIDTH)),
            'widthPlaceholder' => $this->module->l('The pixel width of the plugin'),
            'widthDescription' => $this->module->l('Width in pixels'),
            'layoutLabel' => $this->module->l('Layout'),
            'layout' => Tools::getValue('likeButton-layout', Configuration::get(self::LAYOUT)),
            'layoutStandard' => $this->module->l('Standard'),
            'layoutBoxCount' => $this->module->l('Box (Count)'),
            'layoutButtonCount' => $this->module->l('Button (Count)'),
            'layoutButton' => $this->module->l('Button'),
            'layoutDescription' => $this->module->l('Determines the size and amount of social context next to the button'),
            'actionLabel' => $this->module->l('Action Type'),
            'action' => Tools::getValue('likeButton-action', Configuration::get(self::ACTION)),
            'actionLike' => $this->module->l('Like'),
            'actionRecommend' => $this->module->l('Recommend'),
            'actionDescription' => $this->module->l('The verb to display in the button'),
            'facesLabel' => $this->module->l("Show Friends' Faces"),
            'faces' => Tools::getValue('likeButton-faces', Configuration::get(self::FACES)),
            'facesDescription' => $this->module->l('Check the checkbox to display profile photos below the button (standard layout only)'),
            'shareLabel' => $this->module->l('Include Share Button'),
            'share' => Tools::getValue('likeButton-share', Configuration::get(self::SHARE)),
            'shareDescription' => $this->module->l('Check the checkbox to include a share button beside the Like button'),
            'colorschemeLabel' => $this->module->l('Color Scheme'),
            'colorscheme' => Tools::getValue('likeButton-colorscheme', Configuration::get(self::COLORSCHEME)),
            'colorschemeLight' => $this->module->l('Light'),
            'colorschemeDark' => $this->module->l('Dark'),
            'colorschemeDescription' => $this->module->l('The color scheme used by the plugin for any text outside of the button itself. Can be "light" or "dark".'),
            'submit' => $this->module->l("'Like Button' - update settings")
        );

        return $ret;
    }

    private function validateData()
    {
		$width = (int)Tools::getValue('likeButton-width');
		if ($width <= 0) {
			$this->errors[] = $this->module->l('Like Button: Invalid Width.');
		}
        if ($_POST['likeButton-layout'] != 'standard' && Tools::getValue('likeButton-faces')) {
            $this->errors[] = $this->module->l('Like Button: Profile photos below the button are for standard layout only.');
        }
    }

    private function updateValues()
    {
        Configuration::updateValue(self::ENABLED, (int)Tools::getValue('likeButton-enabled'));
        Configuration::updateValue(self::URL, Tools::getValue('likeButton-url'));
        Configuration::updateValue(self::WIDTH, (int)Tools::getValue('likeButton-width'));
        Configuration::updateValue(self::LAYOUT, Tools::getValue('likeButton-layout'));
        Configuration::updateValue(self::ACTION, Tools::getValue('likeButton-action'));
        Configuration::updateValue(self::FACES, (int)Tools::getValue('likeButton-faces'));
        Configuration::updateValue(self::SHARE, (int)Tools::getValue('likeButton-share'));
        Configuration::updateValue(self::COLORSCHEME, Tools::getValue('likeButton-colorscheme'));
    }
    /**
     * @return boolean
     */
    public function install()
    {
        return Configuration::updateValue(self::ENABLED, $this->enabled) &&
			Configuration::updateValue(self::URL, $this->url) &&
            Configuration::updateValue(self::WIDTH, $this->width) &&
            Configuration::updateValue(self::LAYOUT, $this->layout) &&
            Configuration::updateValue(self::ACTION, $this->action) &&
            Configuration::updateValue(self::FACES, $this->faces) &&
            Configuration::updateValue(self::SHARE, $this->share) &&
            Configuration::updateValue(self::COLORSCHEME, $this->colorscheme);
    }

    /**
     * @return boolean
     */
    public function uninstall()
    {
		return Configuration::deleteByName(self::ENABLED) &&
            Configuration::deleteByName(self::URL) &&
            Configuration::deleteByName(self::WIDTH) &&
            Configuration::deleteByName(self::LAYOUT) &&
            Configuration::deleteByName(self::ACTION) &&
            Configuration::deleteByName(self::FACES) &&
            Configuration::deleteByName(self::SHARE) &&
            Configuration::deleteByName(self::COLORSCHEME);
    }

    /**
     * @return array
     */
    public function getContentForHook()
    {
        $showFaces = (Configuration::get(self::FACES) == 1) ? 'true' : 'false';
        $showShare = (Configuration::get(self::SHARE) == 1) ? 'true' : 'false';

        $ret = array(
            'likeButtonUrl' => Configuration::get(self::URL),
            'likeButtonWidth' => Configuration::get(self::WIDTH),
            'likeButtonLayout' => Configuration::get(self::LAYOUT),
            'likeButtonAction' => Configuration::get(self::ACTION),
            'likeButtonFaces' => $showFaces,
            'likeButtonShare' => $showShare,
            'likeButtonColorscheme' => Configuration::get(self::COLORSCHEME)
        );

        return $ret;
    }
}
