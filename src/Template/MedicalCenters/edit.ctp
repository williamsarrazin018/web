<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MedicalCenter $medicalCenter
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $medicalCenter->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $medicalCenter->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Medical Centers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Adresses'), ['controller' => 'Adresses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Adress'), ['controller' => 'Adresses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Doctors'), ['controller' => 'Doctors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Doctor'), ['controller' => 'Doctors', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="medicalCenters form large-9 medium-8 columns content">
    <?= $this->Form->create($medicalCenter) ?>
    <fieldset>
        <legend><?= __('Edit Medical Center') ?></legend>
        <?php
            echo $this->Form->control('adress_id', ['options' => $adresses]);
            echo $this->Form->control('name');
            echo $this->Form->control('director');
            echo $this->Form->control('phone');
            echo $this->Form->control('details');
            echo $this->Form->control('user_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
