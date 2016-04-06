var app = angular.module('application', []);

app.controller('customersController', function ($scope, $http) {
    $http.get(dataUrl).then(function (response) {
        $scope.data = response.data.data.items;
    });
});

app.controller('dummyController', function ($scope, $http) {
    $scope.data = [
        {
            id: 1,
            name: 'Kura'
        },
        {
            id: 2,
            name: 'Kot'
        },
        {
            id: 3,
            name: 'Albatros'
        }
    ];
});
