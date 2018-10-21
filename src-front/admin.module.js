var admin = angular.module('adminApp', ['ui.router', 'ngResource']);

admin.value('settings', {});

admin.config(['$urlRouterProvider',
    function($urlRouterProvider) {
        $urlRouterProvider.otherwise('/login');
    }]);
