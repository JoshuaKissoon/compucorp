/**
 * Main Javascript file for the contact campaign module
 * 
 * @author Joshua Kissoon
 * @since 20160307
 */

(function (angular, $, _) {

    var resourceUrl = CRM.resourceUrls['com.compucorp.contactcampaign'];
    var contactCampaigns = angular.module('contactCampaigns', ['ngRoute', 'crmResource']);

    contactCampaigns.config(['$routeProvider',
        function ($routeProvider) {
            $routeProvider.when('/contact/campaign/all', {
                templateUrl: resourceUrl + '/partials/contact-campaigns.html',
                controller: 'ContactCampaignsController'
            });
        }
    ]);

    contactCampaigns.controller('ContactCampaignsController', function ($scope) {
        $scope.content = 'Hello World!!';
    });

})(angular, CRM.$, CRM._);