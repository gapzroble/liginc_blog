app.config(['$stateProvider', function($stateProvider) {
    $stateProvider.
        state({
            name: 'detail',
            url: '/detail/:id',
            templateUrl: 'templates/single.html',
            resolve: {
                post: ['Posts', '$stateParams', function (Posts, $stateParams) {
                    return Posts.get({id: $stateParams.id}).$promise;
                }],
            },
            controller: ['$scope', 'post', '$sce', function ($scope, post, $sce) {
                $scope.post = post;

                $scope.content = function () {
                    if (post.pretty) {
                        return post.pretty;
                    }

                    post.pretty = $sce.trustAsHtml(post.content.replace(/\n/g, "<br>"));

                    return post.pretty;
                };
            }],
        });
    }]);
