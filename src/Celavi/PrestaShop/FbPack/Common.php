<?php

namespace Celavi\PrestaShop\FbPack;

class Common
{
    const NAME = 'facebookpack';
    const TAB = 'social_networks';
    const AUTHOR = 'Ales Loncar';
    const VERSION = 1.4;

    public $displayName = 'Facebook Pack';
    public $description = 'Facebook Pack contains Facebook Social Plugins: Like Button, Like Box, Login Button, Facebook Comments';
    public $socialTitle = 'This module contains Facebook Social Plugins';
    public $socialDescriptionCommon = 'One of the easiest ways to make your online presence more social is by adding Facebook social plugins to your shop. Here you can choose to add four different Facebook social plugins.';
    public $socialDescriptionSimple = 'Two simple plugins: Like Button, Like Box.';
    public $socialDescriptionComplex = 'Two plugins requires Facebook Connect to work properly: Comments and Login Button.';

    public function __construct()
    {
    }
}
