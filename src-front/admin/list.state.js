admin.config(['$stateProvider', function($stateProvider) {
    $stateProvider.
        state({
            name: 'list',
            url: '/list',
            templateUrl: 'templates/admin-list.html',
        });
    }]);
