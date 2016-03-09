<?php

    require_once 'CRM/Core/Page.php';

    /**
     * Handles loading the personal campaigns for a specific contact
     * 
     * @author Joshua Kissoon
     * @since 20160308
     */
    class CRM_Contactcampaign_Page_ContactPersonalCampaigns extends CRM_Core_Page
    {

        public function run()
        {
            /* Get contact Id from URL */
            $contactId = $_SESSION['CiviCRM']['CRM_Contact_Page_View_Summary']['cid'];

            // @todo Escape the contact id string 
            // @todo Check if there is a cleaner way to include table names - like drupal does
            $sql = "SELECT pcp.*, (SELECT ov.label FROM civicrm_option_value ov WHERE pcp.status_id = ov.value AND ov.option_group_id=12) AS status
                FROM civicrm_pcp pcp WHERE pcp.contact_id=$contactId";

            $data = CRM_Core_DAO::executeQuery($sql);

            global $base_url;
            $campaigns = array();
            while ($data->fetch())
            {
                /* Get the actual campaign data */
                $campaign = $data->toArray();

                /* Compose the view and edit URL */
                $campaign['edit_url'] = $base_url . "/civicrm/pcp/info?action=update&reset=1&id={$campaign['id']}";
                $campaign['view_url'] = $base_url . "/civicrm/pcp/info?reset=1&id={$campaign['id']}";

                /* Get the list of contributions for this campaign and summarize the contributions */
                $result = civicrm_api3('ContributionSoft', 'get', array(
                    'sequential' => 1,
                    'pcp_id' => $campaign['id'],
                ));
                $campaign['contributions'] = $result['values'];

                $totalContributed = 0;
                foreach ($campaign['contributions'] as $contribution)
                {
                    $totalContributed += $contribution['amount'];
                }
                $campaign['total_contributed'] = $totalContributed;
                $campaign['num_contributions'] = count($campaign['contributions']);

                /* Load the event or contribution related to this PCP */
                $objectType = $campaign['page_type'] == "event" ? "Event" : "ContributionPage";
                $objectResult = civicrm_api3($objectType, 'get', array(
                    'sequential' => 1,
                    'id' => $campaign['page_id'],
                ));
                $campaign['page'] = $objectResult['values'][0];

                $campaigns[] = $campaign;
            }

            /* Add the data to the template */
            $this->assign("campaigns", $campaigns);

            parent::run();
        }

    }
    