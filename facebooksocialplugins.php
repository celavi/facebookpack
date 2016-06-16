<?php
if (!defined('_CAN_LOAD_FILES_'))
	exit;

if (!defined('_PS_VERSION_'))
  exit;

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
		$this->need_instance = 0;
		$this->ps_versions_compliancy = array('min' => '1.5', 'max' => '1.5.6.3');
		
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
		return parent::install() && 
			$this->installValues() && 
			$this->registerHook('displayTop') &&
			$this->registerHook('displayLeftColumnProduct') &&
			$this->registerHook('displayLeftColumn') &&
			$this->registerHook('displayProductTab') &&
			$this->registerHook('displayProductTabContent');			
    }
	
	/**
	 * Install Configuration Values
	 *
	 * @return boolean
	 */
	protected function installValues()
	{
		return $this->fbPack->install() && $this->pluginLikeButton->install() && $this->pluginSaveButton->install() &&
			$this->pluginShareButton->install() && $this->pluginPagePlugin->install() && $this->pluginCommentsPlugin->install();
	}

	public function uninstall()
    {
		return parent::uninstall() && $this->uninstallValues();
    }

	/**
	 * Uninstall Configuration Values
	 *
	 * @return boolean
	 */
	protected function uninstallValues()
	{
		return $this->fbPack->uninstall() && $this->pluginLikeButton->uninstall() && $this->pluginSaveButton->uninstall() &&
			$this->pluginShareButton->uninstall() && $this->pluginPagePlugin->uninstall() && $this->pluginCommentsPlugin->uninstall();
	}

	/**
     * Hook displayTop
     *
     * @param array $params Parameters
     * @return string Content
     */
    public function hookDisplayTop($params)
	{
		$this->context->smarty->assign('locale', $this->fbPack->getLocale());
		$this->context->smarty->assign('sdkVersion', FbPack_Module::FB_SDK);

        return $this->display(__FILE__, 'top.tpl');
    }

    /**
     * Hook displayRightColumnProduct
	 * 
	 * Currently there is no option to sort plugins in this hook
     *
     * @param mixed $params
     */
    public function hookDisplayLeftColumnProduct($params) {

		$html = '';

        if ($this->pluginLikeButton->isEnabled()) {
            $this->context->smarty->assign('FbPack', $this->pluginLikeButton->getContentForHook());
            $html .= $this->display(__FILE__, 'like-button.tpl');
        }

		if ($this->pluginSaveButton->isEnabled()) {
            $this->context->smarty->assign('FbPack', $this->pluginSaveButton->getContentForHook());
            $html .= $this->display(__FILE__, 'save-button.tpl');
        }

		if ($this->pluginShareButton->isEnabled()) {
            $this->context->smarty->assign('FbPack', $this->pluginShareButton->getContentForHook());
            $html .= $this->display(__FILE__, 'share-button.tpl');
        }
		
		return $html;
    }
	
	/**
     * Hook DisplayLeftColumn
     *
     * @param mixed $params
     */
    public function hookDisplayLeftColumn($params)
	{
        if ($this->pluginPagePlugin->isEnabled()) {
            $this->context->smarty->assign('FbPack', $this->pluginPagePlugin->getContentForHook());
            return $this->display(__FILE__, 'page-plugin.tpl');
        }
	}
	
	/**
     * Hook DisplayProductTab
     *
     * @param mixed $params
     */
    public function hookDisplayProductTab($params)
	{	
		if ($this->pluginCommentsPlugin->isEnabled()) {
            $this->context->smarty->assign('FbPack', $this->pluginCommentsPlugin->getContentForHook());
            return $this->display(__FILE__, 'tab-comments.tpl');
        }
    }

    /**
     * Hook displayProductTabContent
     *
     * @param mixed $params
     */
    public function hookDisplayProductTabContent($params)
	{		
		if ($this->pluginCommentsPlugin->isEnabled()) {
            $this->context->smarty->assign('FbPack', $this->pluginCommentsPlugin->getContentForHook());
            return $this->display(__FILE__, 'tab-comments-content.tpl');
        }
    }

	/**
	 *
	 * @return string Content
	 */
	public function getContent()
    {
		$this->context->smarty->assign('displayName', $this->displayName);
		$this->context->smarty->assign('path', $this->_path);
		$this->context->smarty->assign('common', $this->fbPack->getContent());
		$this->context->smarty->assign('likeButton', $this->pluginLikeButton->getContent());
		$this->context->smarty->assign('saveButton', $this->pluginSaveButton->getContent());
		$this->context->smarty->assign('shareButton', $this->pluginShareButton->getContent());
		$this->context->smarty->assign('pagePlugin', $this->pluginPagePlugin->getContent());
		$this->context->smarty->assign('commentsPlugin', $this->pluginCommentsPlugin->getContent());

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $errors = $this->getModuleErrors();
            if (count($errors) > 0) {
                $this->context->smarty->assign('errors', $errors);
            } else {
                $this->context->smarty->assign('pluginSettingsUpdated', TRUE);
            }
        }
		
		return $this->display(__FILE__, '/views/templates/admin/index.tpl');
    }

    private function getModuleErrors()
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
