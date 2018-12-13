var app = angular.module('linkedlists', []);

app.controller('levelsController', function ($scope, $http) {
    // l'url vient de add.ctp
    $http.get(urlToLinkedListFilter).then(function (response) {
        $scope.levels = response.data.levels;
    });
});

