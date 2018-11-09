<?php
$urlToDepartmentsAutocompleteJson = $this->Url->build([
    "controller" => "Departments",
    "action" => "findDepartments",
    "_ext" => "json"
        ]);
echo $this->Html->scriptBlock('var urlToAutocompleteAction = "' . $urlToDepartmentsAutocompleteJson . '";', ['block' => true]);
echo $this->Html->script('Departments/autocomplete', ['block' => 'scriptBottom']);
?>


<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Departments'), ['action' => 'add']) ?></li>
    </ul>
</nav>

<?= $this->Form->create('Departments') ?>
<fieldset>
    <legend><?= __('Search Department') ?></legend>
    <?php
    echo $this->Form->input('department', ['id' => 'autocomplete']);
    ?>
</fieldset>
<?= $this->Form->end() ?>