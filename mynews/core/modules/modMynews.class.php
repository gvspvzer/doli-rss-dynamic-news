<?php
include_once DOL_DOCUMENT_ROOT .'/core/modules/DolibarrModules.class.php';

class modMynews extends DolibarrModules
{
    public function __construct($db)
    {
        global $langs;
        $this->db = $db;
        $this->numero = 104000; // Utiliser un ID unique > 100000
        $this->rights_class = 'mynews';
        $this->family = "crm";
        $this->name = preg_replace('/^mod/i','',get_class($this));
        $this->description = "Ajoute un onglet Actualités aux tiers";

        $this->version = '1.0.0';
        $this->const_name = 'MAIN_MODULE_'.strtoupper($this->name);
        $this->picto = 'generic';
        $this->dirs = array();
        $this->config_page_url = array();

        $this->module_parts = array();

        $this->dictionaries = array();
        $this->boxes = array();
        $this->rights = array();
        $this->rights_class = 'mynews';
        $this->menu = array();

        // Ajout de l’onglet
        $this->tabs = array(
            'thirdparty:+news:Actualités:@mynews:/custom/mynews/news.php?id=__ID__'
        );

        $this->langfiles = array('mynews@mynews');
    }
}
