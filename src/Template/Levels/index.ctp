<?php
$urlToRestApi = $this->Url->build('/api/levels', true);
echo $this->Html->scriptBlock('var urlToRestApi = "' . $urlToRestApi . '";', ['block' => true]);
echo $this->Html->script('Levels/index', ['block' => 'scriptBottom']);
?>

<div ng-app="app" ng-controller="LevelCRUDCtrl">
    <div class="container">
        <div class="row">
            <div class="panel panel-default levels-content">
                <div class="panel-body none formData" id="form">
                    <h2 id="actionLabel">Add/Edit Level</h2>
                    <form class="form" id="levelForm" enctype='application/json'>
                        <div class="form-group">
                            <label>Number</label>
                            <input type="text" class="form-control" name="number" id="number"
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
</div> 