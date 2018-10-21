app.config(['$stateProvider', function($stateProvider) {
    $stateProvider.
        state({
            name: 'home',
            url: '/',
            templateUrl: 'templates/home.html',
        }).
        state({
            name: 'archive',
            url: '/archive',
            templateUrl: 'templates/archive.html',
        });
    }]);
