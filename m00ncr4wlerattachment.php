<?php

if (!defined('_PS_VERSION_'))
    exit;

class m00ncr4wlerAttachment extends Module
{
    public function __construct()
    {
        $this->name = 'm00ncr4wlerattachment';
        $this->tab = 'front_office_features';
        $this->version = '0.1.0';
        $this->author = 'm00ncr4wler - David Heinz';
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Attachment settings.');
        $this->description = $this->l('Attachment settings.');
        //$this->confirmUninstall = $this->l('Are you sure you want to delete your details?');
        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
    }

    public function install()
    {
        if (!parent::install()) {
            return false;
        }
        return true;
    }

    public function uninstall()
    {
        if (!parent::uninstall()) {
            return false;
        }
        return true;
    }
}