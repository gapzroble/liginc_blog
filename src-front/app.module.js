var app = angular.module('blogApp', ['ui.router', 'ngResource']);

app.value('Settings', {
    accessToken: 'MjRlMTZlM2YzYmZkMjdiODg5ZDU1Y2ZiMTYzNzI3ZWFiYjQxN2RlZWVlMWNiNjgwMTQ2YWQ0MGNjYTkxODhhOA',
    pageSize: 5, // number of posts to show per page
});

app.config(['$urlRouterProvider',
    function($urlRouterProvider) {
        $urlRouterProvider.otherwise('/');
    }]);
