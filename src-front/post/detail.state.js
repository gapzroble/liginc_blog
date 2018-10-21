app.config(['$stateProvider', function($stateProvider) {
    $stateProvider.
        state({
            name: 'detail',
            url: '/detail',
            templateUrl: '/templates/single.html',
        });
    }]);
