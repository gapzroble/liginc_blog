/**
 * Define post detail page.
 */
app.config(['$stateProvider', function($stateProvider) {
    $stateProvider.state({
        name: 'detail',
        url: '/post/:id',
        templateUrl: 'templates/single.html',
        resolve: {
            post: ['Posts', '$stateParams', function (Posts, $stateParams) {
                return Posts.get({id: $stateParams.id}).$promise;
            }],
        },
        controller: ['$rootScope', '$scope', 'post', '$sce', function ($rootScope, $scope, post, $sce) {
            $rootScope.pageTitle = post.title;

            $scope.post = post;

            $scope.content = function () {
                if (post.pretty) {
                    return post.pretty;
                }

                // Since admin edit is plain text only, we still need to render
                // content in pretty format.
                // Newlines => <br>
                var pretty = post.content.replace(/\n/g, "<br>");
                post.pretty = $sce.trustAsHtml(pretty);

                return post.pretty;
            };
        }],
    });
}]);
