app.
    factory('Posts', ['$resource', 'Settings', function($resource, Settings) {
        return $resource('api/posts/:id', {id: '@id'}, {
            get: {
                method: 'GET',
                headers: {
                    Authorization: 'Bearer ' + Settings.accessToken
                }
            },
        });
    }]);

