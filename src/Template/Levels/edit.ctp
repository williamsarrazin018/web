<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Level $level
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $level->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $level->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Levels'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Chambers'), ['controller' => 'Chambers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Chamber'), ['controller' => 'Chambers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Assignments'), ['controller' => 'Assignments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Assignment'), ['controller' => 'Assignments', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="levels form large-9 medium-8 columns content">
    <?= $this->Form->create($level) ?>
    <fieldset>
        <legend><?= __('Edit Level') ?></legend>
        <?php
            echo $this->Form->control('number');
            echo $this->Form->control('user_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
