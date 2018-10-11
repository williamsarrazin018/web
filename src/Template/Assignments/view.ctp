<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Assignment $assignment
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
<div class="assignments view large-9 medium-8 columns content">
    <h3><?= h($assignment->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Department') ?></th>
            <td><?= $assignment->has('department') ? $this->Html->link($assignment->department->id, ['controller' => 'Departments', 'action' => 'view', $assignment->department->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Patient') ?></th>
            <td><?= $assignment->has('patient') ? $this->Html->link($assignment->patient->id, ['controller' => 'Patients', 'action' => 'view', $assignment->patient->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reason') ?></th>
            <td><?= h($assignment->reason) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Level') ?></th>
            <td><?= $assignment->has('level') ? $this->Html->link($assignment->level->id, ['controller' => 'Levels', 'action' => 'view', $assignment->level->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Chamber') ?></th>
            <td><?= $assignment->has('chamber') ? $this->Html->link($assignment->chamber->id, ['controller' => 'Chambers', 'action' => 'view', $assignment->chamber->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $assignment->has('user') ? $this->Html->link($assignment->user->id, ['controller' => 'Users', 'action' => 'view', $assignment->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Assignment Date') ?></th>
            <td><?= h($assignment->assignment_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($assignment->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($assignment->modified) ?></td>
        </tr>
    </table>
</div>
