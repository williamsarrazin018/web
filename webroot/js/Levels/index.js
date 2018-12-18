var onloadCallback = function () {
    widgetId1 = grecaptcha.render('loginCaptcha', {
        'sitekey': '6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI'
    });
};

var app = angular.module('app', []);

app.controller('usersCtrl', function ($scope, $http) {
    // more angular JS codes will be here

    // Login Process
    $scope.login = function () {
        if (grecaptcha.getResponse(widgetId1) === '') {
            $scope.captcha_status = 'Please verify captha.';
            return;
        }

        var req = {
            method: 'POST',
            url: 'api/users/token',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            data: {username: $scope.username, password: $scope.password}
        };
        // fields in key-value pairs
        $http(req)
            .success(function (jsonData, status, headers, config) {
                // console.log(jsonData.data.token);
                // tell the user was logged
                Materialize.toast('User sucessfully logged in', 4000);
                localStorage.setItem('token', jsonData.data.token);
                localStorage.setItem('user_id', jsonData.data.id);
                // Switch button for Logout
                $('#login-btn').hide();
                $('#logout-btn').show();
            })
            .error(function (data, status, headers, config) {
                //console.log(data.response.result);
                // tell the user was not logged
                Materialize.toast(data.message, 4000);
            });
        // close modal
        $('#modal-login-form').modal('close');
    };
    // Login Process
    $scope.logout = function () {
        localStorage.setItem('token', 'no token');
        $('#logout-btn').hide();
        $('#login-btn').show();
        // show modal
        $('#modal-logout-form').modal('close');
    };
    $scope.changePassword = function () {
        var req = {
            method: 'PUT',
            url: 'api/users/' + localStorage.getItem('user_id'),
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + localStorage.getItem('token')
            },
            data: {'password': $scope.newPassword}
        };
        $http(req)
            .success(function (response) {
                // tell the user subcategory record was updated
                Materialize.toast('Password successfully changed', 4000);
                // close modal
                $('#modal-logout-form').modal('close');
            })
            .error(function (response) {
                // tell the user subcategory record was not updated
                //console.log(response);
                Materialize.toast('Could not update Password', 4000);

            });
    };
});

app.controller('LevelCRUDCtrl', ['$scope', 'LevelCRUDService', function ($scope, LevelCRUDService) {

    $scope.updateLevel = function () {
        if (localStorage.getItem('token') !== 'no token') {
            LevelCRUDService.updateLevel($scope.level.id, $scope.level.number)
                .then(function success(response) {
                        Materialize.toast('Level data updated!', 4000);
                        $scope.getAllLevels();
                    },
                    function error(response) {
                        Materialize.toast('Error updating level!', 4000);
                    });
        } else {
            Materialize.toast('Please login!', 4000);
        }
    };

    $scope.getLevel = function (id) {
        LevelCRUDService.getLevel(id)
            .then(function success(response) {
                    $scope.level = response.data.data;
                    $scope.level.id = id;
                },
                function error(response) {
                    if (response.status === 404) {
                        Materialize.toast('Level not found!', 4000);
                    }
                    else {
                        Materialize.toast('Error getting level!', 4000);
                    }
                });
    };

    $scope.addLevel = function () {
        if (localStorage.getItem('token') !== 'no token') {
            if ($scope.level !== null && $scope.level.number) {
                LevelCRUDService.addLevel($scope.level.number)
                    .then(function success(response) {
                            Materialize.toast('Level added!', 4000);
                            $scope.getAllLevels();
                        },
                        function error(response) {
                            Materialize.toast('Error adding level!', 4000);
                        });
            }
            else {
                Materialize.toast('Please enter a number!', 4000);
            }
        } else {
            Materialize.toast('Please login!', 4000);
        }
    };

    $scope.deleteLevel = function (id) {
        if (localStorage.getItem('token') !== 'no token') {
            LevelCRUDService.deleteLevel(id)
                .then(function success(response) {
                        Materialize.toast('Level deleted!', 4000);
                        $scope.level = null;
                        $scope.getAllLevels();
                    },
                    function error(response) {
                        Materialize.toast('Error deleting level!', 4000);
                    });
        } else {
            Materialize.toast('Please login!', 4000);
        }
    };

    $scope.getAllLevels = function () {
        LevelCRUDService.getAllLevels()
            .then(function success(response) {
                    $scope.levels = response.data.data;
                },
                function error(response) {
                    Materialize.toast('Error getting levels!', 4000);
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
            data: {number: number},
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
            data: {number: number},
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

// jquery codes will be here
$(document).ready(function () {
    // initialize modal
    $('.modal').modal();
    localStorage.setItem('token', 'no token');
    $('#logout-btn').hide();
});
