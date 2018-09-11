<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Adress $adress
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Adress'), ['action' => 'edit', $adress->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Adress'), ['action' => 'delete', $adress->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adress->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Adresses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Adress'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Medical Centers'), ['controller' => 'MedicalCenters', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Medical Center'), ['controller' => 'MedicalCenters', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Patients'), ['controller' => 'Patients', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Patient'), ['controller' => 'Patients', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="adresses view large-9 medium-8 columns content">
    <h3><?= h($adress->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Adress') ?></th>
            <td><?= h($adress->adress) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('City') ?></th>
            <td><?= h($adress->city) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Zip Code') ?></th>
            <td><?= h($adress->zip_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Province') ?></th>
            <td><?= h($adress->province) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Country') ?></th>
            <td><?= h($adress->country) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Details') ?></th>
            <td><?= h($adress->details) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($adress->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Id') ?></th>
            <td><?= $this->Number->format($adress->user_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($adress->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($adress->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Medical Centers') ?></h4>
        <?php if (!empty($adress->medical_centers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Adress Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Director') ?></th>
                <th scope="col"><?= __('Phone') ?></th>
                <th scope="col"><?= __('Details') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($adress->medical_centers as $medicalCenters): ?>
            <tr>
                <td><?= h($medicalCenters->id) ?></td>
                <td><?= h($medicalCenters->adress_id) ?></td>
                <td><?= h($medicalCenters->name) ?></td>
                <td><?= h($medicalCenters->director) ?></td>
                <td><?= h($medicalCenters->phone) ?></td>
                <td><?= h($medicalCenters->details) ?></td>
                <td><?= h($medicalCenters->created) ?></td>
                <td><?= h($medicalCenters->modified) ?></td>
                <td><?= h($medicalCenters->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'MedicalCenters', 'action' => 'view', $medicalCenters->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'MedicalCenters', 'action' => 'edit', $medicalCenters->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'MedicalCenters', 'action' => 'delete', $medicalCenters->id], ['confirm' => __('Are you sure you want to delete # {0}?', $medicalCenters->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Patients') ?></h4>
        <?php if (!empty($adress->patients)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Adress Id') ?></th>
                <th scope="col"><?= __('First Name') ?></th>
                <th scope="col"><?= __('Last Name') ?></th>
                <th scope="col"><?= __('Gender') ?></th>
                <th scope="col"><?= __('Birth Date') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Slug') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($adress->patients as $patients): ?>
            <tr>
                <td><?= h($patients->id) ?></td>
                <td><?= h($patients->adress_id) ?></td>
                <td><?= h($patients->first_name) ?></td>
                <td><?= h($patients->last_name) ?></td>
                <td><?= h($patients->gender) ?></td>
                <td><?= h($patients->birth_date) ?></td>
                <td><?= h($patients->email) ?></td>
                <td><?= h($patients->created) ?></td>
                <td><?= h($patients->modified) ?></td>
                <td><?= h($patients->slug) ?></td>
                <td><?= h($patients->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Patients', 'action' => 'view', $patients->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Patients', 'action' => 'edit', $patients->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Patients', 'action' => 'delete', $patients->id], ['confirm' => __('Are you sure you want to delete # {0}?', $patients->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
