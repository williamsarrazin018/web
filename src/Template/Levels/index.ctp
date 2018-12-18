<?php
$urlToRestApi = $this->Url->build('/api/levels', true);
echo $this->Html->scriptBlock('var urlToRestApi = "' . $urlToRestApi . '";', ['block' => true]);
echo $this->Html->script('Levels/index', ['block' => 'scriptBottom']);
?>

<div class="container" ng-app="app">
    <div class="container" ng-controller="usersCtrl" class="d-inline-block align-top-right">
        <!-- floating button for login -->
        <div id="login-btn" class="fixed-action-btn" style="top:45px; right:24px;">
            <a class="waves-effect waves-light btn margin-bottom-1em modal-trigger" href="#modal-login-form"><i
                        class="material-icons left">account_box</i>Login</a>
        </div>
        <!-- modal for user login -->
        <div id="modal-login-form" class="modal">
            <div class="modal-content">
                <h4 id="modal-login-title">Login</h4>
                <div class="row">
                    <div class="input-field col s12">
                        <input ng-model="username" type="text" class="validate" id="username" name="username"
                               placeholder="Type username here..."/>
                        <label for="username">Username</label>
                    </div>
                    <div class="input-field col s12">
                        <input ng-model="password" type="password" class="validate" id="password" name="password"
                               placeholder="Type password here..."/>
                        <label for="password">Password</label>
                    </div>
                    <div class="input-field col s12">
                        <div id="loginCaptcha"></div>
                        <p style="color:red;">{{ captcha_status}}</p>
                    </div>
                    <div class="input-field col s12">
                        <a id="btn-create-login" class="waves-effect waves-dark btn margin-bottom-1em"
                           ng-click="login()"><i class="material-icons left">add</i>Login</a>
                        <a class="modal-action modal-close waves-effect waves-light btn margin-bottom-1em"><i
                                    class="material-icons left">close</i>Close</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- floating button for logout/change password -->
        <div id="logout-btn" class="fixed-action-btn" style="top:45px; right:24px;">
            <a class="waves-effect waves-dark btn margin-bottom-1em modal-trigger" href="#modal-logout-form"><i
                        class="material-icons left">eject</i>Logout (Change Password)</a>
        </div>
        <!-- modal for user logout -->
        <div id="modal-logout-form" class="modal">
            <div class="modal-content">
                <h4 id="modal-login-title">Logout or Change Password</h4>
                <div class="row">
                    <div class="input-field col s12">
                        <input ng-model="newPassword" type="password" class="validate" id="form-password"
                               placeholder="Type password here..."/>
                        <label for="password">New Password</label>
                    </div>
                    <div class="input-field col s12">
                        <a id="btn-create-login" class="waves-effect waves-light btn margin-bottom-1em"
                           ng-click="changePassword()"><i class="material-icons left">autorenew</i>Change Password</a>
                        <a id="btn-create-login" class="waves-effect waves-light btn margin-bottom-1em"
                           ng-click="logout()"><i class="material-icons left">eject</i>Logout</a>
                        <a class="modal-action modal-close waves-effect waves-light btn margin-bottom-1em"><i
                                    class="material-icons left">close</i>Close</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" ng-controller="LevelCRUDCtrl">
        <div class="panel panel-default levels-content">
            <div class="panel-body none formData" id="form">
                <h3 id="actionLabel">Add/Edit Level</h3>
                <form class="form" id="levelForm" enctype='application/json'>
                    <div class="form-group">
                        <label>Number</label>
                        <input type="number" class="form-control" name="number" id="number"
                               ng-model="level.number"/>
                    </div>
                    <input type="hidden" class="form-control" name="id" id="id" ng-model="level.id"/>
                    <a href="javascript:void(0);" class="btn btn-success"
                       ng-click="addLevel(level.number)">Add Level</a>
                    <a href="javascript:void(0);" class="btn btn-success"
                       ng-click="updateLevel(level.id, level.number)">Update Level</a>
                </form>
            </div>
            <br>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Number</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody id="levelData">
                <tr ng-repeat="level in levels">
                    <td>#{{level.id}}</td>
                    <td>{{level.number}}</td>
                    <td>
                        <a href="javascript:void(0);" class="glyphicon glyphicon-edit"
                           ng-click="getLevel(level.id)"></a>
                        <a href="javascript:void(0);" class="glyphicon glyphicon-trash"
                           ng-click="deleteLevel(level.id)"></a>
                    </td>
                </tr>
                <tr>
                    <td colspan="5">No level(s) found......</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>