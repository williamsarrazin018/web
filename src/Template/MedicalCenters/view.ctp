<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MedicalCenter $medicalCenter
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Medical Center'), ['action' => 'edit', $medicalCenter->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Medical Center'), ['action' => 'delete', $medicalCenter->id], ['confirm' => __('Are you sure you want to delete # {0}?', $medicalCenter->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Medical Centers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Medical Center'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Adresses'), ['controller' => 'Adresses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Adress'), ['controller' => 'Adresses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Doctors'), ['controller' => 'Doctors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Doctor'), ['controller' => 'Doctors', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="medicalCenters view large-9 medium-8 columns content">
    <h3><?= h($medicalCenter->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Adress') ?></th>
            <td><?= $medicalCenter->has('adress') ? $this->Html->link($medicalCenter->adress->id, ['controller' => 'Adresses', 'action' => 'view', $medicalCenter->adress->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($medicalCenter->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Director') ?></th>
            <td><?= h($medicalCenter->director) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= h($medicalCenter->phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Details') ?></th>
            <td><?= h($medicalCenter->details) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($medicalCenter->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Id') ?></th>
            <td><?= $this->Number->format($medicalCenter->user_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($medicalCenter->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($medicalCenter->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Doctors') ?></h4>
        <?php if (!empty($medicalCenter->doctors)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Address Id') ?></th>
                <th scope="col"><?= __('Medical Center Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($medicalCenter->doctors as $doctors): ?>
            <tr>
                <td><?= h($doctors->id) ?></td>
                <td><?= h($doctors->address_id) ?></td>
                <td><?= h($doctors->medical_center_id) ?></td>
                <td><?= h($doctors->name) ?></td>
                <td><?= h($doctors->created) ?></td>
                <td><?= h($doctors->modified) ?></td>
                <td><?= h($doctors->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Doctors', 'action' => 'view', $doctors->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Doctors', 'action' => 'edit', $doctors->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Doctors', 'action' => 'delete', $doctors->id], ['confirm' => __('Are you sure you want to delete # {0}?', $doctors->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
