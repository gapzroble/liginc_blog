// define our module
var app = angular.module('blogApp', ['ui.router', 'ngResource']);

// store values here to be used in other components of the app
app.value('Settings', {
    // needed by api/
    accessToken: 'MjRlMTZlM2YzYmZkMjdiODg5ZDU1Y2ZiMTYzNzI3ZWFiYjQxN2RlZWVlMWNiNjgwMTQ2YWQ0MGNjYTkxODhhOA',

    // number of posts to show per page
    pageSize: 5,
});


app.config(['$urlRouterProvider', function($urlRouterProvider) {
    // redirect /admin to Symfony controller
    $urlRouterProvider.when('/admin', ['$window', function ($window) {
        $window.location.replace('admin/');
    }]);

    // homepage fallback
    $urlRouterProvider.otherwise('/');
}]);

// define a common controller
app.controller('app.controller', ['$scope', function($scope) {
    // since it's SPA (single page app), we need to close the menu (if open)
    $scope.closeMenu = function () {
        var hamburger = $('.js-hamburger');
        if (hamburger.hasClass('is-active')) {
            hamburger.trigger('click');
        }
    }
}]);

app.run(['$transitions', function($transitions) {
    // reset page scroll
    $transitions.onSuccess({}, function(trans) {
        // scroll to top
        $('a.js-scroll').trigger('click');
    });
}]);
