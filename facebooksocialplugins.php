<?php
if (!defined('_CAN_LOAD_FILES_')) {
    exit();
}

require_once __DIR__ . '/src/FbPack/Module.php';
require_once __DIR__ . '/src/FbPack/Plugin/LikeButton.php';
require_once __DIR__ . '/src/FbPack/Plugin/PagePlugin.php';
require_once __DIR__ . '/src/FbPack/Plugin/SaveButton.php';
require_once __DIR__ . '/src/FbPack/Plugin/ShareButton.php';
require_once __DIR__ . '/src/FbPack/Plugin/CommentsPlugin.php';

/**
 * Facebook Social Plugins.
 *
 * Facebook Social Plugins let you see what your friends have liked,
 * commented on or shared on sites across the web
 */
class FacebookSocialPlugins extends Module
{
	/**
	 * @var FbPack_Module
	 */ 
	private $fbPack = null;

	/**
	 * @var FbPack_Plugin_LikeButton
	 */
	private $pluginLikeButton = null;
	
	/**
	 * @var FbPack_Plugin_SaveButton
	 */
	private $pluginSaveButton = null;
	
	
	/**
	 * @var FbPack_Plugin_ShareButton
	 */
	private $pluginShareButton = null;
	
	/**
	 * @var FbPack_Plugin_PagePlugin
	 */
	private $pluginPagePlugin = null;

	/**
	 * @var FbPack_Plugin_CommentsPlugin
	 */
	private $pluginCommentsPlugin = null;
	
    public function __construct()
    {
        $this->name = FbPack_Module::NAME;;
        $this->tab = FbPack_Module::TAB;
        $this->author = FbPack_Module::AUTHOR;
        $this->version = FbPack_Module::VERSION;
		
        parent::__construct();
		
		$this->displayName = FbPack_Module::DISPLAY_NAME;
        $this->description = FbPack_Module::DESCRIPTION;
        $this->confirmUninstall = FbPack_Module::CONFIRM_UNINSTALL;

		if ($this->fbPack === null) {
			$this->fbPack = new FbPack_Module($this);
		}
		if ($this->pluginLikeButton === null) {
			$this->pluginLikeButton = new FbPack_Plugin_LikeButton($this);
		}
		if ($this->pluginSaveButton === null) {
			$this->pluginSaveButton = new FbPack_Plugin_SaveButton($this);
		}
		if ($this->pluginShareButton === null) {
			$this->pluginShareButton = new FbPack_Plugin_ShareButton($this);
		}
		if ($this->pluginPagePlugin === null) {
			$this->pluginPagePlugin = new FbPack_Plugin_PagePlugin($this);
		}
		if ($this->pluginCommentsPlugin === null) {
			$this->pluginCommentsPlugin = new FbPack_Plugin_CommentsPlugin($this);
		}
    }

    public function install()
    {
        if (!parent::install() or
            !$this->registerHook('top') or
            !$this->registerHook('extraLeft') or
			!$this->registerHook('leftColumn') or
			!$this->registerHook('productTab') or
            !$this->registerHook('productTabContent') or
            !$this->installValues()) {
            return false;
        }

        return true;
    }

	/**
     * Returns module content for Top
     *
     * @param array $params Parameters
     * @return string Content
     */
    public function hookTop($params)
	{
		global $smarty;

		$smarty->assign('locale', $this->fbPack->getLocale());
		$smarty->assign('sdkVersion', FbPack_Module::FB_SDK);

        return $this->display(__FILE__, '/templates/hook/top.tpl');
    }

    /**
     * Hook Extra Left
	 * 
	 * Currently there is no option to sort plugins in this hook
     *
     * @param mixed $params
     */
    public function hookExtraLeft($params) {
        global $smarty;
		
		$html = '';

        if ($this->pluginLikeButton->isEnabled()) {
            $smarty->assign('FbPack', $this->pluginLikeButton->getContentForHook());
            $html .= $this->display(__FILE__, 'templates/hook/like-button.tpl');
        }
		
		if ($this->pluginSaveButton->isEnabled()) {
            $smarty->assign('FbPack', $this->pluginSaveButton->getContentForHook());
            $html .= $this->display(__FILE__, 'templates/hook/save-button.tpl');
        }
		
		if ($this->pluginShareButton->isEnabled()) {
            $smarty->assign('FbPack', $this->pluginShareButton->getContentForHook());
            $html .= $this->display(__FILE__, 'templates/hook/share-button.tpl');
        }
		
		return $html;
    }
	
	/**
     * Hook Left Column
     *
     * @param mixed $params
     */
    public function hookLeftColumn($params) {
        global $smarty;
		
		if ($this->pluginPagePlugin->isEnabled()) {
            $smarty->assign('FbPack', $this->pluginPagePlugin->getContentForHook());
            return $this->display(__FILE__, 'templates/hook/page-plugin.tpl');
        }
	}
	
	/**
     * Hook Tab on product page
     *
     * @param mixed $params
     */
    public function hookProductTab($params) {
        global $smarty;
		
		if ($this->pluginCommentsPlugin->isEnabled()) {
            $smarty->assign('FbPack', $this->pluginCommentsPlugin->getContentForHook());
            return $this->display(__FILE__, 'templates/hook/tab-comments.tpl');
        }
    }

    /**
     * Hook Content of tab on product page
     *
     * @param mixed $params
     */
    public function hookProductTabContent($params) {
        global $smarty;
		
		if ($this->pluginCommentsPlugin->isEnabled()) {
            $smarty->assign('FbPack', $this->pluginCommentsPlugin->getContentForHook());
            return $this->display(__FILE__, 'templates/hook/tab-comments-content.tpl');
        }
    }

	/**
	 * Install Configuration Values
	 *
	 * @return boolean
	 */
	protected function installValues()
	{
        if (!$this->fbPack->install() or
            !$this->pluginLikeButton->install() or
			!$this->pluginSaveButton->install() or
			!$this->pluginShareButton->install() or
			!$this->pluginPagePlugin->install() or
			!$this->pluginCommentsPlugin->install()) {
            return false;
        }
		return true;
	}

	public function uninstall()
    {
        if (!parent::uninstall() or
            !$this->uninstallValues()) {
            return false;
        }

        return true;
    }

	/**
	 * Uninstall Configuration Values
	 *
	 * @return boolean
	 */
	protected function uninstallValues()
	{
        if (!$this->fbPack->uninstall() or
            !$this->pluginLikeButton->uninstall() or
			!$this->pluginSaveButton->uninstall() or
			!$this->pluginShareButton->uninstall() or 
			!$this->pluginPagePlugin->uninstall() or
			!$this->pluginCommentsPlugin->uninstall()) {
            return false;
        }

		return true;
	}

	/**
	 *
	 * @return string Content
	 */
	public function getContent()
    {
        global $smarty;

		$smarty->assign('displayName', $this->displayName);
        $smarty->assign('path', $this->_path);
        $smarty->assign('common', $this->fbPack->getContent());
		$smarty->assign('likeButton', $this->pluginLikeButton->getContent());
		$smarty->assign('saveButton', $this->pluginSaveButton->getContent());
		$smarty->assign('shareButton', $this->pluginShareButton->getContent());
		$smarty->assign('pagePlugin', $this->pluginPagePlugin->getContent());
		$smarty->assign('commentsPlugin', $this->pluginCommentsPlugin->getContent());

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $errors = $this->getErrors();
            if (count($errors) > 0) {
                $smarty->assign('errors', $errors);
            } else {
                $smarty->assign('pluginSettingsUpdated', TRUE);
            }
        }

        return $this->display(__FILE__, '/templates/content/index.tpl');
    }

    private function getErrors()
    {
        $errors = array();
		if (count($this->fbPack->getErrors()) > 0) {
            $errors = array_merge($errors, $this->fbPack->getErrors());
        }
        if (count($this->pluginLikeButton->getErrors()) > 0) {
            $errors = array_merge($errors, $this->pluginLikeButton->getErrors());
        }
		if (count($this->pluginPagePlugin->getErrors()) > 0) {
            $errors = array_merge($errors, $this->pluginPagePlugin->getErrors());
        }
		if (count($this->pluginCommentsPlugin->getErrors()) > 0) {
            $errors = array_merge($errors, $this->pluginCommentsPlugin->getErrors());
        }
        return $errors;
    }
}
