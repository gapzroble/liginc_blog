admin.config(['$stateProvider', function($stateProvider) {
    $stateProvider.
        state({
            name: 'login',
            url: '/login',
            templateUrl: '/templates/admin-login.html',
        });
    }]);
