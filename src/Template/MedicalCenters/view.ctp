<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MedicalCenter $medicalCenter
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
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($medicalCenter->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($medicalCenter->modified) ?></td>
        </tr>
    </table>
    
</div>
