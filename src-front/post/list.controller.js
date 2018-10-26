/**
 * Controller for homepage and archive.
 */
app.controller('post.list.controller', ['$scope', '$state', 'data',
    function($scope, $state, data) {
        $scope.data = data;

        $scope.getPages = function () {
            var pages = [];
            for (var i = 1; i <= data.pagination.totalPages; i++) {
                pages.push(i);
            }
            return pages;
        };

        $scope.isFirstPage = function () {
            return data.pagination.current === 1;
        };

        $scope.isLastPage = function () {
            return data.pagination.current === data.pagination.totalPages;
        };

        $scope.previous = function () {
            if (!$scope.isFirstPage()) {
                $state.go('archive', {page: data.pagination.current - 1});
            }
        };

        $scope.next = function () {
            if (!$scope.isLastPage()) {
                $state.go('archive', {page: data.pagination.current + 1});
            }
        };

        $scope.isCurrent = function (page) {
            return data.pagination.current === page;
        };
    }
]);
