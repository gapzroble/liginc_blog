app.
    factory('Posts', ['$resource', 'Settings', function($resource, Settings) {
        return $resource('api/posts/:id', {id: '@id'}, {
            get: {
                method: 'GET',
                params: {
                    access_token: Settings.accessToken,
                },
            },
        });
    }]);

