var app = angular.module('app', []);

app.controller('LevelCRUDCtrl', ['$scope', 'LevelCRUDService', function ($scope, LevelCRUDService) {
        $scope.updateLevel = function () {
            LevelCRUDService.updateLevel($scope.level.id, $scope.level.number)
                    .then(function success(response) {
                        $scope.message = 'Level data updated!';
                        $scope.errorMessage = '';
                        $scope.getAllLevels();
                    },
                            function error(response) {
                                $scope.errorMessage = 'Error updating level!';
                                $scope.message = '';
                            });
        };
        $scope.getLevel = function (id) {
            LevelCRUDService.getLevel(id)
                    .then(function success(response) {
                        $scope.level = response.data.data;
                        $scope.level.id = id;
                        $scope.message = '';
                        $scope.errorMessage = '';
                    },
                            function error(response) {
                                $scope.message = '';
                                if (response.status === 404) {
                                    $scope.errorMessage = 'Level not found!';
                                } else {
                                    $scope.errorMessage = 'Error getting level!';
                                }
                            });
        };
        $scope.addLevel = function () {
            if ($scope.level !== null && $scope.level.number) {
                LevelCRUDService.addLevel($scope.level.number)
                        .then(function success(response) {
                            $scope.message = 'Level added!';
                            $scope.errorMessage = '';
                            $scope.getAllLevels();
                        },
                                function error(response) {
                                    $scope.errorMessage = 'Error adding level!';
                                    $scope.message = '';
                                });
            } else {
                $scope.errorMessage = 'Please enter a number!';
                $scope.message = '';
            }
        };
        $scope.deleteLevel = function (id) {
            LevelCRUDService.deleteLevel(id)
                    .then(function success(response) {
                        $scope.message = 'Level deleted!';
                        $scope.level = null;
                        $scope.errorMessage = '';
                        $scope.getAllLevels();
                    },
                            function error(response) {
                                $scope.errorMessage = 'Error deleting level!';
                                $scope.message = '';
                            });
        };
        $scope.getAllLevels = function () {
            LevelCRUDService.getAllLevels()
                    .then(function success(response) {
                        $scope.levels = response.data.data;
                        $scope.message = '';
                        $scope.errorMessage = '';
                    },
                            function error(response) {
                                $scope.message = '';
                                $scope.errorMessage = 'Error getting levels!';
                            });
        };
        $scope.getAllLevels();
    }]);
app.service('LevelCRUDService', ['$http', function ($http) {
        this.getLevel = function getLevel(levelId) {
            return $http({
                method: 'GET',
                url: 'api/levels/' + levelId,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            });
        };

        this.addLevel = function addLevel(number) {
            return $http({
                method: 'POST',
                url: 'api/levels',
                data: {name: name},
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            });
        };
        this.deleteLevel = function deleteLevel(id) {
            return $http({
                method: 'DELETE',
                url: 'api/levels/' + id,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            });
        };
        this.updateLevel = function updateLevel(id, number) {
            return $http({
                method: 'PATCH',
                url: 'api/levels/' + id,
                data: {name: name},
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            });
        };
        this.getAllLevels = function getAllLevels() {
            return $http({
                method: 'GET',
                url: 'api/levels',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            });
        };
    }]); 