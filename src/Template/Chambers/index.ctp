<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Chamber[]|\Cake\Collection\CollectionInterface $chambers
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Chamber'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Levels'), ['controller' => 'Levels', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Level'), ['controller' => 'Levels', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Departments'), ['controller' => 'Departments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Department'), ['controller' => 'Departments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Assignments'), ['controller' => 'Assignments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Assignment'), ['controller' => 'Assignments', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="chambers index large-9 medium-8 columns content">
    <h3><?= __('Chambers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('level_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('department_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($chambers as $chamber): ?>
            <tr>
                <td><?= $this->Number->format($chamber->id) ?></td>
                <td><?= $this->Number->format($chamber->number) ?></td>
                <td><?= $chamber->has('level') ? $this->Html->link($chamber->level->id, ['controller' => 'Levels', 'action' => 'view', $chamber->level->id]) : '' ?></td>
                <td><?= $chamber->has('department') ? $this->Html->link($chamber->department->id, ['controller' => 'Departments', 'action' => 'view', $chamber->department->id]) : '' ?></td>
                <td><?= h($chamber->created) ?></td>
                <td><?= h($chamber->modified) ?></td>
                <td><?= $this->Number->format($chamber->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $chamber->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $chamber->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $chamber->id], ['confirm' => __('Are you sure you want to delete # {0}?', $chamber->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
