<?php
if (!defined('_CAN_LOAD_FILES_')) {
    exit();
}

require_once __DIR__.'/vendor/autoload.php';

// PrestaShop v1.4 doesn't use namespaces so we need to call classes with full names

/**
 * Facebook Pack.
 *
 * Facebook Pack contains Facebook Social Plugins which let you see what your friends have liked,
 * commented on or shared on sites across the web.
 */
class FacebookPack extends Module
{
    /**
     * @var \Celavi\PrestaShop\FbPack\Common
     */
    private $fbPack = null;

    public function __construct()
    {
        $logger = \Celavi\PrestaShop\ModuleHandler::getInstance()->getLogger();
        $logger->info(__METHOD__);

        if ($this->fbPack === null) {
            $this->fbPack = new \Celavi\PrestaShop\FbPack\Common();
        }

        $this->name = \Celavi\PrestaShop\FbPack\Common::NAME;
        $this->tab = \Celavi\PrestaShop\FbPack\Common::TAB;
        $this->author = \Celavi\PrestaShop\FbPack\Common::AUTHOR;
        $this->version = \Celavi\PrestaShop\FbPack\Common::VERSION;
        parent::__construct();

        $this->displayName = $this->l($this->fbPack->displayName);
        $this->description = $this->l($this->fbPack->description);
        $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');
    }

    public function install()
    {
        $logger = \Celavi\PrestaShop\ModuleHandler::getInstance()->getLogger();
        $logger->info(__METHOD__);

        if (!parent::install()) {
            return false;
        }

        return true;
    }

    public function uninstall()
    {
        $logger = \Celavi\PrestaShop\ModuleHandler::getInstance()->getLogger();
        $logger->info(__METHOD__);

        if (!parent::uninstall()) {
            return false;
        }

        return true;
    }

    public function getContent()
    {
        $logger = \Celavi\PrestaShop\ModuleHandler::getInstance()->getLogger();
        $logger->info(__METHOD__);

        $template = \Celavi\PrestaShop\ModuleHandler::getInstance()->getTemplate();
        $data = array(
            'displayName' => $this->fbPack->displayName,
            'path' => $this->_path,
            'enablePlugin' => $this->l('Enable Plugin'),
            'yes' => $this->l('yes'),
            'no' => $this->l('no'),
            'socialTitle' => $this->fbPack->socialTitle,
            'socialDescriptionCommon' => $this->fbPack->socialDescriptionCommon,
            'socialDescriptionSimple' => $this->fbPack->socialDescriptionSimple,
            'socialDescriptionComplex' => $this->fbPack->socialDescriptionComplex
        );
        return $template->render('content.html', $data);
    }
}
