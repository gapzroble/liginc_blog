var app = angular.module('blogApp', ['ui.router', 'ngResource']);

app.value('settings', {});

app.config(['$urlRouterProvider',
    function($urlRouterProvider) {
        $urlRouterProvider.otherwise('/');
    }]);
