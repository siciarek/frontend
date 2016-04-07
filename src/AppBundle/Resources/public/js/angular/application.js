function fetchData(url, $http, $scope) {
    $http.get(url).then(function (response) {
        $scope.data = response.data.data.items;
    });
}

var app = angular.module('application', []);

app.controller('customerEditController', ['$scope', function ($scope) {
        
        $scope.master = {};

        $scope.update = function (user) {
            $scope.master = angular.copy(user);
        };

        $scope.reset = function () {
            $scope.user = angular.copy($scope.master);
        };

        $scope.reset();
    }
]);


app.controller('customersController', function ($scope, $http, $interval) {

    var infoSelector = 'js-modal-info';

    $scope.selected = {rec: null};

    $scope.showInfo = function (id) {
        var i = 0;

        for (; i < $scope.data.length; i++) {
            if ($scope.data[i].id === id) {
                $scope.selected.rec = $scope.data[i];
                break;
            }
        }

        var element = document.getElementById(infoSelector);
        element.style.display = 'block';
    };

    $scope.hideInfo = function () {
        var element = document.getElementById(infoSelector);
        element.style.display = 'none';
    };

    $scope.remove = function (id) {
        var i = 0;

        for (; i < $scope.data.length; i++) {
            if ($scope.data[i].id === id) {
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
