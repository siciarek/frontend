var APP = angular.module('APP', []);

APP.run(function($rootScope) {
    $rootScope.name = 'Sample AngularJS application';
});

APP.controller('DefaultController', ['$scope', function ($scope) {
        $scope.data = {
            name: 'Zażółć gęślą jaźń',
            items: [
                {
                    id: 1,
                    name: 'Zażółć'
                },
                {
                    id: 2,
                    name: 'Gęślą'
                },
                {
                    id: 3,
                    name: 'Jaźń'
                }
            ]
        };

        $scope.value = null;

        $scope.setValue = function (value) {
            $scope.value = value;
        };

        $scope.setValue = function (value) {
            $scope.value = value;
        };

        $scope.resetValue = function () {
            $scope.value = null;
        };
    }]);

APP.directive('notificationInfo', function () {
    return {
        templateUrl: 'templates/notification/info.html',
        restrict: 'E',
        replace: true
    };
});

APP.directive('notificationError', function () {
    return {
        templateUrl: 'templates/notification/error.html',
        restrict: 'E',
        replace: true
    };
});

APP.directive('list', function () {
    return {
        templateUrl: 'templates/list.html',
        restrict: 'E',
        replace: true
    };
});

APP.directive('typePesel', function () {
    return {
        require: 'ngModel',
        link: function (scope, element, attr, control) {
            var validation = function (value) {

                // Simple PESEL validation:
                var valid = value.match(/^\d{11}$/) !== null;

                control.$setValidity('pesel', valid);
                return value;
            };

            control.$parsers.push(validation);
        }
    };
});
