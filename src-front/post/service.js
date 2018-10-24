app.
    factory('Posts', ['$resource', function($resource) {
        return $resource('api/posts/:id', {id: '@id'}, {
            get: {
                method: 'GET',
            },
        });
    }]);

