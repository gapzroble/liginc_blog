/**
 * Define state for list and archive.
 * 
 * We need to return .$promise to block page transition if not resource is not
 * yet resolved.
 */
app.config(['$stateProvider', function($stateProvider) {
    $stateProvider.
        state({
            name: 'home',
            url: '/',
            controller: 'post.list.controller',
            templateUrl: 'templates/home.html',
            resolve: {
                data: ['Posts', 'Settings', function (Posts, Settings) {
                    return Posts.get({pageSize: Settings.pageSize}).$promise;
                }],
            },
        }).
        state({
            name: 'archive',
            url: '/archive/:page',
            controller: 'post.list.controller',
            templateUrl: 'templates/archive.html',
            resolve: {
                data: ['Posts', '$stateParams', 'Settings',
                function (Posts, $stateParams, Settings) {
                    return Posts.get({
                        page: $stateParams.page,
                        pageSize: Settings.pageSize
                    }).$promise;
                }],
            },
        });
    }]);
