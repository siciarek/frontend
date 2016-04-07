function fetchData(url, $http, $scope) {
    $http.get(url).then(function (response) {
        $scope.data = response.data.data.items;
    });
}

var app = angular.module('application', []);

app.controller('customersController', function ($scope, $http, $interval) {

    var infoSelector = 'js-modal-info';

    $scope.selected = { rec: null };

    $scope.showInfo = function () {
        var element = document.getElementById(infoSelector);
        element.style.display = 'block';
    };

    $scope.hideInfo = function () {
        var element = document.getElementById(infoSelector);
        element.style.display = 'none';
    };

    $scope.remove = function (id) {
        var i = 0;

        for(; i < $scope.data.length; i++) {
            if($scope.data[i].id === id) {
                break;
            }
        }

        $scope.data.splice(i, 1);
    };

    fetchData(dataUrl, $http, $scope);

    $interval(function () {
        fetchData(dataUrl, $http, $scope);
    }, refreshAfter * 1000)
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
