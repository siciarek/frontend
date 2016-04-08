var APP = angular.module('APP',[]);

APP.controller('DefaultController', ['$scope', function($scope) {
    $scope.value = null;

    $scope.setValue = function(value) {
        $scope.value = value;
    };

    $scope.setValue = function(value) {
        $scope.value = value;
    };

    $scope.resetValue = function() {
        $scope.value = null;
    };
}]);

