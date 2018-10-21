app.config(['$urlRouterProvider',
    function($urlRouterProvider) {
        $urlRouterProvider.when('/admin', ['$window', function ($window) {
            $window.location.replace('admin.html');
        }]);
    }]);
