<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Chamber $chamber
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
            <th scope="row"><?= __('Number') ?></th>
            <td><?= $this->Number->format($chamber->number) ?></td>
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

                <th scope="col"><?= __('Department Id') ?></th>
                <th scope="col"><?= __('Patient Id') ?></th>
                <th scope="col"><?= __('Assignment Date') ?></th>
                <th scope="col"><?= __('Reason') ?></th>
                <th scope="col"><?= __('Level Id') ?></th>
                <th scope="col"><?= __('Chamber Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>

                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($chamber->assignments as $assignments): ?>
            <tr>

                <td><?= h($assignments->department_id) ?></td>
                <td><?= h($assignments->patient_id) ?></td>
                <td><?= h($assignments->assignment_date) ?></td>
                <td><?= h($assignments->reason) ?></td>
                <td><?= h($assignments->level_id) ?></td>
                <td><?= h($assignments->chamber_id) ?></td>
                <td><?= h($assignments->created) ?></td>
                <td><?= h($assignments->modified) ?></td>

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
