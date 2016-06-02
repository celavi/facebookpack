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
    public function __construct()
    {
        $logger = \Celavi\PrestaShop\ModuleHandler::getInstance()->getLogger();
        $logger->info(__METHOD__);

        $this->name = \Celavi\PrestaShop\FbPack\Common::NAME;
        $this->tab = \Celavi\PrestaShop\FbPack\Common::TAB;
        $this->author = \Celavi\PrestaShop\FbPack\Common::AUTHOR;
        $this->version = \Celavi\PrestaShop\FbPack\Common::VERSION;
        parent::__construct();

        $this->displayName = $this->l(\Celavi\PrestaShop\FbPack\Common::displayName);
        $this->description = $this->l(\Celavi\PrestaShop\FbPack\Common::description);
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
            'displayName' => $this->displayName,
            'path' => $this->_path,
            'enablePlugin' => $this->l(\Celavi\PrestaShop\FbPack\Common::enablePlugin),
            'yes' => $this->l(\Celavi\PrestaShop\FbPack\Common::yes),
            'no' => $this->l(\Celavi\PrestaShop\FbPack\Common::no),
            'socialTitle' => $this->l(\Celavi\PrestaShop\FbPack\Common::socialTitle),
            'socialDescriptionCommon' => $this->l(\Celavi\PrestaShop\FbPack\Common::socialDescriptionCommon),
            'socialDescriptionSimple' => $this->l(\Celavi\PrestaShop\FbPack\Common::socialDescriptionSimple),
            'socialDescriptionComplex' => $this->l(\Celavi\PrestaShop\FbPack\Common::socialDescriptionComplex),
            'requestUri' => $_SERVER['REQUEST_URI'],
        );
        return $template->render('plugin/content.html', $data);
    }
}
