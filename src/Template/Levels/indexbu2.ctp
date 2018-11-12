<?php
$urlToRestApi = $this->Url->build('/api/levels', true);
echo $this->Html->scriptBlock('var urlToRestApi = "' . $urlToRestApi . '";', ['block' => true]);
echo $this->Html->script('Levels/index', ['block' => 'scriptBottom']);
?>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
<div class="container">
    <div class="row">
        <div class="panel panel-default levels-content">
            <div class="panel-heading"><?= __('Levels ') ?> <a href="javascript:void(0);" id="addLink" class="pull-right" onclick="javascript:$('#addForm').slideToggle();"><i class="glyphicon glyphicon-plus"></i>Add</a></div>
            
            <?php 
                        $loguser = $this->request->getSession()->read('Auth.User');
                    ?>
            <div class="panel-body none formData" id="addForm">
                <h2 id="actionLabel">Add Level</h2>
                <form class="form" id="levelAddForm" enctype='application/json'>
                    <?=$this->Form->control('number'); ?>
                    <?=$this->Form->control('user_id', ['options' => [$loguser['id']]]); ?>                 
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#addForm').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="levelAction('add')">Add Level</a>
                </form>
            </div>
            
            
            <div class="panel-body none formData" id="editForm">
                <h2 id="actionLabel">Edit Level</h2>
                <form class="form" id="levelEditForm" enctype='application/json'>
                    <?=$this->Form->control('number', ['id' => 'numberEdit']); ?>
                    
                    <?=$this->Form->control('user_id', ['id' => 'user_idEdit', 'value' => $loguser['id']]); ?> 
                    <input type="hidden" class="form-control" name="id" id="idEdit"/>
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#editForm').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="levelAction('edit')">Update Level</a>
                </form>
            </div>
            
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th></th>
                        <th>id</th>
                        <th>Number</th>
                        <th>user id</th>
                        <th>Actions</th>
                        
                    </tr>
                </thead>
                <tbody id="adressData">
                    <?php
                    $count = 0;
                    foreach ($levels as $level): $count++;
                        ?>
                        <tr>
                            <td><?php echo '#' . $count; ?></td>
                            <td><?php echo $level['id']; ?></td>
                            <td><?php echo $level['number']; ?></td>
                            <td><?php echo $level['user_id']; ?></td>

                            <td>
                                <a href="javascript:void(0);" class="glyphicon glyphicon-edit" onclick="editLevel('<?php echo $level['id']; ?>')"></a>
                                <a href="javascript:void(0);" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete data?') ? levelAction('delete', '<?php echo $level['id']; ?>') : false;"></a>
                            </td>
                        </tr>
                        <?php
                    endforeach;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
    </body>
</html>

