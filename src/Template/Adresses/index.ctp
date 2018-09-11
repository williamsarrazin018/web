<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Adress[]|\Cake\Collection\CollectionInterface $adresses
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Adress'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Medical Centers'), ['controller' => 'MedicalCenters', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Medical Center'), ['controller' => 'MedicalCenters', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Patients'), ['controller' => 'Patients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Patient'), ['controller' => 'Patients', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="adresses index large-9 medium-8 columns content">
    <h3><?= __('Adresses') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('adress') ?></th>
                <th scope="col"><?= $this->Paginator->sort('city') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zip_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('province') ?></th>
                <th scope="col"><?= $this->Paginator->sort('country') ?></th>
                <th scope="col"><?= $this->Paginator->sort('details') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($adresses as $adress): ?>
            <tr>
                <td><?= $this->Number->format($adress->id) ?></td>
                <td><?= h($adress->adress) ?></td>
                <td><?= h($adress->city) ?></td>
                <td><?= h($adress->zip_code) ?></td>
                <td><?= h($adress->province) ?></td>
                <td><?= h($adress->country) ?></td>
                <td><?= h($adress->details) ?></td>
                <td><?= h($adress->created) ?></td>
                <td><?= h($adress->modified) ?></td>
                <td><?= $this->Number->format($adress->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $adress->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $adress->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $adress->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adress->id)]) ?>
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
