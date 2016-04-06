<?php $view->extend('::base.html.php') ?>

<?php $view['slots']->start('stylesheets') ?>
<!-- http://www.w3schools.com/w3css/ -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,600,400italic,600italic,700,700italic,800,800italic|Open+Sans+Condensed:300,300italic,700&subset=latin-ext' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3-theme-indigo.css">
<style>
    .w3-opensans {
        font-family: 'Open Sans', sans-serif;
        font-weight: 300;
    }
</style>
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
</script>
<?php $view['slots']->stop() ?>

<div ng-app="application" class="w3-container w3-opensans">

    <h1>Application</h1>

    <div class="w3-container w3-pale-green w3-leftbar w3-border-green w3-card-2">
        <p>London is the capital city of England.
            It is the most populous city in the United Kingdom,
            with a metropolitan area of over 13 million inhabitants.</p>
    </div>

    <br/>

    <div class="w3-container w3-light-grey w3-leftbar w3-border-blue w3-card-2">
        <p>Lorem ipsum, dolor sit ammet.</p>
    </div>

    <br/>

    <div ng-controller="dummyController" class="w3-card-2 w3-container">
        <h3>List ({{data.length}})</h3>

        <ul class="w3-ul">
            <li ng-repeat="rec in data|orderBy:'-name'">
                {{rec.name}}
            </li>
        </ul>
        <br/>
    </div>

    <br/>

    <div ng-controller="customersController" class="w3-card-2 w3-container">
        <h3>Table ({{data.length}})</h3>

        <table class="w3-table-all">
            <thead>
                <tr class="w3-light-grey">
                    <th>#</th>
                    <th>{{'name'|uppercase}}</th>
                    <th>{{'city'|uppercase}}</th>
                    <th>{{'country'|uppercase}}</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="rec in data">
                    <td>{{rec.id}}</td>
                    <td>{{rec.name}}</td>
                    <td>{{rec.city}}</td>
                    <td>{{rec.country}}</td>
                    <td>&nbsp;</td>
                </tr>
            </tbody>
        </table>
        <br/>
    </div>

</div>

<br/>

