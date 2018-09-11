<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Chamber $chamber
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Chamber'), ['action' => 'edit', $chamber->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Chamber'), ['action' => 'delete', $chamber->id], ['confirm' => __('Are you sure you want to delete # {0}?', $chamber->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Chambers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Chamber'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Levels'), ['controller' => 'Levels', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Level'), ['controller' => 'Levels', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Departments'), ['controller' => 'Departments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Department'), ['controller' => 'Departments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Assignments'), ['controller' => 'Assignments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Assignment'), ['controller' => 'Assignments', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="chambers view large-9 medium-8 columns content">
    <h3><?= h($chamber->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Level') ?></th>
            <td><?= $chamber->has('level') ? $this->Html->link($chamber->level->id, ['controller' => 'Levels', 'action' => 'view', $chamber->level->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Department') ?></th>
            <td><?= $chamber->has('department') ? $this->Html->link($chamber->department->id, ['controller' => 'Departments', 'action' => 'view', $chamber->department->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($chamber->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Number') ?></th>
            <td><?= $this->Number->format($chamber->number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Id') ?></th>
            <td><?= $this->Number->format($chamber->user_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($chamber->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($chamber->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Assignments') ?></h4>
        <?php if (!empty($chamber->assignments)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Department Id') ?></th>
                <th scope="col"><?= __('Patient Id') ?></th>
                <th scope="col"><?= __('Assignment Date') ?></th>
                <th scope="col"><?= __('Reason') ?></th>
                <th scope="col"><?= __('Level Id') ?></th>
                <th scope="col"><?= __('Chamber Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($chamber->assignments as $assignments): ?>
            <tr>
                <td><?= h($assignments->id) ?></td>
                <td><?= h($assignments->department_id) ?></td>
                <td><?= h($assignments->patient_id) ?></td>
                <td><?= h($assignments->assignment_date) ?></td>
                <td><?= h($assignments->reason) ?></td>
                <td><?= h($assignments->level_id) ?></td>
                <td><?= h($assignments->chamber_id) ?></td>
                <td><?= h($assignments->created) ?></td>
                <td><?= h($assignments->modified) ?></td>
                <td><?= h($assignments->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Assignments', 'action' => 'view', $assignments->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Assignments', 'action' => 'edit', $assignments->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Assignments', 'action' => 'delete', $assignments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $assignments->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
