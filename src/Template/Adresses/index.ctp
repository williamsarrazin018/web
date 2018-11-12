<?php
$urlToRestApi = $this->Url->build('/api/adresses', true);
echo $this->Html->scriptBlock('var urlToRestApi = "' . $urlToRestApi . '";', ['block' => true]);
echo $this->Html->script('Adresses/index', ['block' => 'scriptBottom']);
?>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
<div class="container">
    <div class="row">
        <div class="panel panel-default adresses-content">
            <div class="panel-heading"><?= __('Adresses ') ?> <a href="javascript:void(0);" id="addLink" class="pull-right" onclick="javascript:$('#addForm').slideToggle();"><i class="glyphicon glyphicon-plus"></i>Add</a></div>
            
            
            <div class="panel-body none formData" id="addForm">
                <h2 id="actionLabel">Add Adress</h2>
                <form class="form" id="adressAddForm" enctype='application/json'>
                    <?=$this->Form->control('adress', ['value' => 'text']); ?>
                    <?=$this->Form->control('city'); ?>
                    <?=$this->Form->control('zip_code'); ?>
                    <?=$this->Form->control('province'); ?>
                    <?=$this->Form->control('country'); ?>
                    <?=$this->Form->control('details'); ?>
                    <?=$this->Form->control('user_id'); ?>                  
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#addForm').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="adressAction('add')">Add Adress</a>
                </form>
            </div>
            
            
            <div class="panel-body none formData" id="editForm">
                <h2 id="actionLabel">Edit Adress</h2>
                <form class="form" id="adressEditForm" enctype='application/json'>
                    <div class="form-group">
                        <label>Adress</label>
                        <input type="text" class="form-control" name="adress" id="adressEdit"/>
                    </div>
                    <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" name="city" id="cityEdit"/>
                    </div>
                    <div class="form-group">
                        <label>Zip code</label>
                        <input type="text" class="form-control" name="zip_code" id="zip_codeEdit"/>
                    </div>
                    <div class="form-group">
                        <label>Province</label>
                        <input type="text" class="form-control" name="province" id="provinceEdit"/>
                    </div>
                    <div class="form-group">
                        <label>Country</label>
                        <input type="text" class="form-control" name="country" id="countryEdit"/>
                    </div>
                    <div class="form-group">
                        <label>User id</label>
                        <input type="text" class="form-control" name="user_id" id="user_idEdit"/>
                    </div>
                    <input type="hidden" class="form-control" name="id" id="idEdit"/>
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#editForm').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="adressAction('edit')">Update Adress</a>
                    <!-- input type="submit" class="btn btn-success" id="editButton" value="Update Adress" -->
                </form>
            </div>
            
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th></th>
                        <th>id</th>
                        <th>Adress</th>
                        <th>City</th>
                        <th>Zip code</th>
                        <th>Province</th>
                        <th>Country</th>
                        <th>Details</th>
                        <th>Actions</th>
                        
                    </tr>
                </thead>
                <tbody id="adressData">
                    <?php
                    $count = 0;
                    foreach ($adresses as $adress): $count++;
                        ?>
                        <tr>
                            <td><?php echo '#' . $count; ?></td>
                            <td><?php echo $adress['id']; ?></td>
                            <td><?php echo $adress['adress']; ?></td>
                            <td><?php echo $adress['city']; ?></td>
                            <td><?php echo $adress['zip_code']; ?></td>
                            <td><?php echo $adress['province']; ?></td>
                            <td><?php echo $adress['country']; ?></td>
                            <td><?php echo $adress['details']; ?></td>
                            <td>
                                <a href="javascript:void(0);" class="glyphicon glyphicon-edit" onclick="editAdress('<?php echo $adress['id']; ?>')"></a>
                                <a href="javascript:void(0);" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete data?') ? adressAction('delete', '<?php echo $adress['id']; ?>') : false;"></a>
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

