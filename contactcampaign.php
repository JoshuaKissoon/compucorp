<?php

    require_once 'contactcampaign.civix.php';

    /**
     * Implements hook_civicrm_config().
     *
     * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
     */
    function contactcampaign_civicrm_config(&$config)
    {
        _contactcampaign_civix_civicrm_config($config);
    }

    /**
     * Implements hook_civicrm_xmlMenu().
     *
     * @param array $files
     *
     * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
     */
    function contactcampaign_civicrm_xmlMenu(&$files)
    {
        _contactcampaign_civix_civicrm_xmlMenu($files);
    }

    /**
     * Implements hook_civicrm_install().
     *
     * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
     */
    function contactcampaign_civicrm_install()
    {
        _contactcampaign_civix_civicrm_install();
    }

    /**
     * Implements hook_civicrm_uninstall().
     *
     * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
     */
    function contactcampaign_civicrm_uninstall()
    {
        _contactcampaign_civix_civicrm_uninstall();
    }

    /**
     * Implements hook_civicrm_enable().
     *
     * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
     */
    function contactcampaign_civicrm_enable()
    {
        _contactcampaign_civix_civicrm_enable();
    }

    /**
     * Implements hook_civicrm_disable().
     *
     * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
     */
    function contactcampaign_civicrm_disable()
    {
        _contactcampaign_civix_civicrm_disable();
    }

    /**
     * Implements hook_civicrm_upgrade().
     *
     * @param $op string, the type of operation being performed; 'check' or 'enqueue'
     * @param $queue CRM_Queue_Queue, (for 'enqueue') the modifiable list of pending up upgrade tasks
     *
     * @return mixed
     *   Based on op. for 'check', returns array(boolean) (TRUE if upgrades are pending)
     *                for 'enqueue', returns void
     *
     * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
     */
    function contactcampaign_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL)
    {
        return _contactcampaign_civix_civicrm_upgrade($op, $queue);
    }

    /**
     * Implements hook_civicrm_managed().
     *
     * Generate a list of entities to create/deactivate/delete when this module
     * is installed, disabled, uninstalled.
     *
     * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
     */
    function contactcampaign_civicrm_managed(&$entities)
    {
        _contactcampaign_civix_civicrm_managed($entities);
    }

    /**
     * Implements hook_civicrm_caseTypes().
     *
     * Generate a list of case-types.
     *
     * @param array $caseTypes
     *
     * Note: This hook only runs in CiviCRM 4.4+.
     *
     * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
     */
    function contactcampaign_civicrm_caseTypes(&$caseTypes)
    {
        _contactcampaign_civix_civicrm_caseTypes($caseTypes);
    }

    /**
     * Implements hook_civicrm_angularModules().
     *
     * Generate a list of Angular modules.
     *
     * Note: This hook only runs in CiviCRM 4.5+. It may
     * use features only available in v4.6+.
     *
     * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
     */
    function contactcampaign_civicrm_angularModules(&$angularModules)
    {
        $angularModules['contactCampaigns'] = array(
            "ext" => "com.compucorp.contactcampaign",
            "js" => array("js/contactcampaign.js")
        );
    }

    /**
     * Implements hook_civicrm_alterSettingsFolders().
     *
     * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
     */
    function contactcampaign_civicrm_alterSettingsFolders(&$metaDataFolders = NULL)
    {
        _contactcampaign_civix_civicrm_alterSettingsFolders($metaDataFolders);
    }

    /**
     * Functions below this ship commented out. Uncomment as required.
     *

      /**
     * Implements hook_civicrm_preProcess().
     *
     * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_preProcess
     *
      function contactcampaign_civicrm_preProcess($formName, &$form) {

      } // */
    /**
     * Implements hook_civicrm_navigationMenu().
     *
     * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_navigationMenu
     *
      function contactcampaign_civicrm_navigationMenu(&$menu) {
      _contactcampaign_civix_insert_navigation_menu($menu, NULL, array(
      'label' => ts('The Page', array('domain' => 'com.compucorp.contactcampaign')),
      'name' => 'the_page',
      'url' => 'civicrm/the-page',
      'permission' => 'access CiviReport,access CiviContribute',
      'operator' => 'OR',
      'separator' => 0,
      ));
      _contactcampaign_civix_navigationMenu($menu);
      } // */

    /**
     * Implementation of hook_civicrm_tabset
     * 
     * Here we create a new tab on the contact page
     * 
     * @author Joshua Kissoon
     * @since 20160307
     */
    function contactcampaign_civicrm_tabset($tabsetName, &$tabs, $context)
    {
        /* Ensure it's the contact view tabset */
        if ($tabsetName != "civicrm/contact/view")
        {
            return;
        }

        /* Add a new tab */
        global $base_url;

        $tabs['personal_campaign_pages'] = array(
            'title' => ts('Personal Campaigns'),
            // 'url' => $base_url . '/civicrm/a/#contact/campaign/all',
            'url' => $base_url . '/civicrm/contact/campaign/all',
        );
    }
    