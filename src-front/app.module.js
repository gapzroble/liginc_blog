var app = angular.module('blogApp', ['ui.router', 'ngResource']);

app.value('Settings', {
    accessToken: 'MjRlMTZlM2YzYmZkMjdiODg5ZDU1Y2ZiMTYzNzI3ZWFiYjQxN2RlZWVlMWNiNjgwMTQ2YWQ0MGNjYTkxODhhOA',
    pageSize: 5, // number of posts to show per page
});

app.config(['$urlRouterProvider', function($urlRouterProvider) {
    $urlRouterProvider.otherwise('/');
}]);

app.controller('app.controller', ['$scope', function($scope) {
    $scope.closeMenu = function () {
        var hamburger = $('.js-hamburger');
        if (hamburger.hasClass('is-active')) {
            hamburger.trigger('click');
        }
    }
}]);

app.run(['$transitions', function($transitions) {
    $transitions.onSuccess({}, function(trans) {
        // scroll to top
        $('a.js-scroll').trigger('click');
    });
}]);
