<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Adress $adress
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $adress->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $adress->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Adresses'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Medical Centers'), ['controller' => 'MedicalCenters', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Medical Center'), ['controller' => 'MedicalCenters', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Patients'), ['controller' => 'Patients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Patient'), ['controller' => 'Patients', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="adresses form large-9 medium-8 columns content">
    <?= $this->Form->create($adress) ?>
    <fieldset>
        <legend><?= __('Edit Adress') ?></legend>
        <?php
            echo $this->Form->control('adress');
            echo $this->Form->control('city');
            echo $this->Form->control('zip_code');
            echo $this->Form->control('province');
            echo $this->Form->control('country');
            echo $this->Form->control('details');
            echo $this->Form->control('user_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
