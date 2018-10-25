var app = angular.module('blogApp', ['ui.router', 'ngResource']);

app.value('Settings', {
    accessToken: 'MjRlMTZlM2YzYmZkMjdiODg5ZDU1Y2ZiMTYzNzI3ZWFiYjQxN2RlZWVlMWNiNjgwMTQ2YWQ0MGNjYTkxODhhOA',
    pageSize: 5, // number of posts to show per page
});

app.config(['$urlRouterProvider', '$httpProvider',
    function($urlRouterProvider, $httpProvider) {
        $urlRouterProvider.otherwise('/');

        // append api token
        $httpProvider.interceptors.push(['Settings', function (Settings) {
            return {
                request: function (config) {
                    if (config.url.indexOf('api/') !== -1) {
                        config.url += '?access_token=' + Settings.accessToken;
                    }
                    return config;
                },
            };
        }]);
    }]);
