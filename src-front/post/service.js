app.
    factory('Post', ['$resource', function($resouce) {
        return $resource('posts/:id.json', {id: '@id'}, {
            get: {
                method: 'GET',
            },
            update: {
                method: 'POST',
            },
            create: {
                method: 'POST',
            },
            delete: {
                method: 'DELETE',
            }
        });
    }]);

