<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Assignment[]|\Cake\Collection\CollectionInterface $assignments
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <?php if($user['type'] === 'secretaireNC') : ?>

        <li><?= $this->Html->link(__('See patients'), ['controller' => 'Patients', 'action' => 'index']) ?></li> 
        <li><?= $this->Html->link(__('See assignments'), ['controller' => 'Assignments', 'action' => 'index']) ?></li> 
        <li><?= $this->Html->link(__('See adresses'), ['controller' => 'Adresses', 'action' => 'index']) ?></li> 
        <li><?= $this->Html->link(__('Profile'), ['controller' => 'Users', 'action' => 'view/' . $user['id']]) ?></li> 
        <li><?= $this->Html->link(__('Resend confirmation link'), ['controller' => 'Emails', 'action' => 'index', $user['uuid'], $user['email'], $user['id']]) ?></li> 

        <?php elseif($user['type'] === 'secretaire') : ?>
        
        <li><?= $this->Html->link(__('Patients management'), ['controller' => 'Patients', 'action' => 'index']) ?></li> 
        <li><?= $this->Html->link(__('New patient'), ['controller' => 'Patients', 'action' => 'add']) ?></li> 
        <li><?= $this->Html->link(__('Assignments management'), ['controller' => 'Assignments', 'action' => 'index']) ?></li> 
        <li><?= $this->Html->link(__('New assignment'), ['controller' => 'Assignments', 'action' => 'add']) ?></li> 
        <li><?= $this->Html->link(__('Adresses management'), ['controller' => 'Adresses', 'action' => 'index']) ?></li> 
        <li><?= $this->Html->link(__('New adress'), ['controller' => 'Adresses', 'action' => 'add']) ?></li> 
        <li><?= $this->Html->link(__('Files management'), ['controller' => 'Files', 'action' => 'index']) ?></li> 
        <li><?= $this->Html->link(__('New file'), ['controller' => 'Files', 'action' => 'add']) ?></li> 
        <li><?= $this->Html->link(__('Profile'), ['controller' => 'Users', 'action' => 'view/' . $user['id']]) ?></li> 
        
        <?php elseif($user['type'] === 'admin') : ?>
        
       
        <li><?= $this->Html->link(__('Users management'), ['controller' => 'Users', 'action' => 'index']) ?></li> 
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Medical centers management'), ['controller' => 'MedicalCenters', 'action' => 'index']) ?></li> 
        <li><?= $this->Html->link(__('New Medical Center'), ['controller' => 'MedicalCenters', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Departments management'), ['controller' => 'Departments', 'action' => 'index']) ?></li> 
        <li><?= $this->Html->link(__('New department'), ['controller' => 'Departments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Patients management'), ['controller' => 'Patients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New patient'), ['controller' => 'Patients', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Assignments management'), ['controller' => 'Assignments', 'action' => 'index']) ?></li> 
        <li><?= $this->Html->link(__('New assignment'), ['controller' => 'Assignments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Adresses management'), ['controller' => 'Adresses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New adress'), ['controller' => 'Adresses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Chambers management'), ['controller' => 'Chambers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New chamber'), ['controller' => 'Chambers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Levels management'), ['controller' => 'Levels', 'action' => 'index']) ?></li> 
        <li><?= $this->Html->link(__('New level'), ['controller' => 'Levels', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Files management'), ['controller' => 'Files', 'action' => 'index']) ?></li> 
        <li><?= $this->Html->link(__('New file'), ['controller' => 'Files', 'action' => 'add']) ?></li> 
        <li><?= $this->Html->link(__('Profile'), ['controller' => 'Users', 'action' => 'view/' . $user['id']]) ?></li> 
        <?php else : ?>
        
        <li><?= $this->Html->link(__('New account'), ['controller' => 'Users', 'action' => 'add']) ?></li> 
        <li><?= $this->Html->link(__('Login'), ['controller' => 'Users', 'action' => 'login']) ?></li> 
        <li><?= $this->Html->link(__('See medical centers'), ['controller' => 'MedicalCenters', 'action' => 'index']) ?></li> 
        <li><?= $this->Html->link(__('See departments'), ['controller' => 'Departments', 'action' => 'index']) ?></li> 
        <?php endif; ?>
    </ul>
</nav>
<div class="assignments index large-9 medium-8 columns content">
    <h3><?= __('Assignments') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('department_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('patient_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('assignment_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reason') ?></th>
                <th scope="col"><?= $this->Paginator->sort('level_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('chamber_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($assignments as $assignment): ?>
            <tr>
                <td><?= $this->Number->format($assignment->id) ?></td>
                <td><?= $assignment->has('department') ? $this->Html->link($assignment->department->id, ['controller' => 'Departments', 'action' => 'view', $assignment->department->id]) : '' ?></td>
                <td><?= $assignment->has('patient') ? $this->Html->link($assignment->patient->id, ['controller' => 'Patients', 'action' => 'view', $assignment->patient->id]) : '' ?></td>
                <td><?= h($assignment->assignment_date) ?></td>
                <td><?= h($assignment->reason) ?></td>
                <td><?= $assignment->has('level') ? $this->Html->link($assignment->level->id, ['controller' => 'Levels', 'action' => 'view', $assignment->level->id]) : '' ?></td>
                <td><?= $assignment->has('chamber') ? $this->Html->link($assignment->chamber->id, ['controller' => 'Chambers', 'action' => 'view', $assignment->chamber->id]) : '' ?></td>
                <td><?= h($assignment->created) ?></td>
                <td><?= h($assignment->modified) ?></td>
                <td><?= $assignment->has('user') ? $this->Html->link($assignment->user->id, ['controller' => 'Users', 'action' => 'view', $assignment->user->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $assignment->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $assignment->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $assignment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $assignment->id)]) ?>
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
