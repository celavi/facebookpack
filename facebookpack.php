<?php
if (!defined('_CAN_LOAD_FILES_')) {
    exit();
}

require_once __DIR__ . '/src/FbPack/Module.php';
require_once __DIR__ . '/src/FbPack/Plugin/LikeButton.php';

/**
 * Facebook Pack.
 *
 * Facebook Pack contains Facebook Social Plugins which let you see what your friends have liked,
 * commented on or shared on sites across the web.
 */
class FacebookPack extends Module
{
	/**
	 * @var FbPack_Module
	 */
	private $fbPack = null;
	
	/**
	 * @var FbPack_Plugin_LikeButton
	 */
	private $pluginLikeButton = null;

	
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
    }

    public function install()
    {
        if (!parent::install() OR
            !$this->registerHook('top') OR
            !$this->updateValues()) {
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
	 * Update Configuration Values
	 * 
	 * @return boolean
	 */
	protected function updateValues()
	{	
		return true;
	}

	public function uninstall()
    {
        if (!parent::uninstall() OR
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
		
        return $this->display(__FILE__, '/templates/content/index.tpl');
    }
}
