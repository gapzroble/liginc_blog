admin.config(['$stateProvider', function($stateProvider) {
    $stateProvider.
        state({
            name: 'create',
            url: '/new',
            templateUrl: 'templates/admin-post.html',
        }).
        state({
            name: 'edit',
            url: '/edit',
            templateUrl: 'templates/admin-post.html',
        });
    }]);
