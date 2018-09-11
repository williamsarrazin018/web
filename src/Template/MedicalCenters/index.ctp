<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MedicalCenter[]|\Cake\Collection\CollectionInterface $medicalCenters
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Medical Center'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Adresses'), ['controller' => 'Adresses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Adress'), ['controller' => 'Adresses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Doctors'), ['controller' => 'Doctors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Doctor'), ['controller' => 'Doctors', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="medicalCenters index large-9 medium-8 columns content">
    <h3><?= __('Medical Centers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('adress_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('director') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('details') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($medicalCenters as $medicalCenter): ?>
            <tr>
                <td><?= $this->Number->format($medicalCenter->id) ?></td>
                <td><?= $medicalCenter->has('adress') ? $this->Html->link($medicalCenter->adress->id, ['controller' => 'Adresses', 'action' => 'view', $medicalCenter->adress->id]) : '' ?></td>
                <td><?= h($medicalCenter->name) ?></td>
                <td><?= h($medicalCenter->director) ?></td>
                <td><?= h($medicalCenter->phone) ?></td>
                <td><?= h($medicalCenter->details) ?></td>
                <td><?= h($medicalCenter->created) ?></td>
                <td><?= h($medicalCenter->modified) ?></td>
                <td><?= $this->Number->format($medicalCenter->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $medicalCenter->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $medicalCenter->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $medicalCenter->id], ['confirm' => __('Are you sure you want to delete # {0}?', $medicalCenter->id)]) ?>
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
