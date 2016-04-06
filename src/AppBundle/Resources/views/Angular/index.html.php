<?php $view->extend('::base.html.php') ?>

<?php $view['slots']->start('stylesheets') ?>
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<?php $view['slots']->stop() ?>

<?php $view['slots']->start('javascripts') ?>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<script>
    var dataUrl = '<?php echo $view['router']->url('default.data'); ?>';
</script>

<script>
    var app = angular.module('application', []);
    app.controller('customersController', function ($scope, $http) {
        $http.get(dataUrl).then(function (response) {
            $scope.data = response.data.data.items;
        });
    });
</script>
<?php $view['slots']->stop() ?>

<div ng-app="application" ng-controller="customersController" class="w3-col s6">
    <ul class="w3-ul">
        <li ng-repeat="rec in data">
            <strong>{{rec.id}}</strong>
            {{[rec.name, rec.city, rec.country].join(', ')}}
        </li>
    </ul>
</div>
