<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New account'), ['controller' => 'Users', 'action' => 'add']) ?></li> 
        <li><?= $this->Html->link(__('login'), ['controller' => 'Users', 'action' => 'login']) ?></li> 
        <li><?= $this->Html->link(__('See medical centers'), ['controller' => 'MedicalCenters', 'action' => 'index']) ?></li> 
        <li><?= $this->Html->link(__('See departments'), ['controller' => 'Departments', 'action' => 'index']) ?></li> 
    </ul>
</nav>
<div class="users index large-9 medium-8 columns content">
    <h1>Login</h1>
<?= $this->Form->create() ?>
<?= $this->Form->control('email') ?>
<?= $this->Form->control('password') ?>
<?= $this->Form->button('Login') ?>
<?= $this->Form->end() ?>

</div>

