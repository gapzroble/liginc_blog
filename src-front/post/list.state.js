app.config(['$stateProvider', function($stateProvider) {
    $stateProvider.
        state({
            name: 'home',
            url: '/',
            controller: 'post.list.controller',
            templateUrl: 'templates/home.html',
            resolve: {
                data: ['Posts', function (Posts) {
                    return Posts.get();
                }],
            },
        }).
        state({
            name: 'archive',
            url: '/archive/:page',
            controller: 'post.list.controller',
            templateUrl: 'templates/archive.html',
            resolve: {
                data: ['Posts', '$stateParams', function (Posts, $stateParams) {
                    return Posts.get({page: $stateParams.page});
                }],
            },
        });
    }]);
