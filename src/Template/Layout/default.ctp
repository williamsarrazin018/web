<?php


$cakeDescription = 'Medical centers managment';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?php
    echo $this->Html->css([
        'base.css',
        'style.css',
        'https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css',
        'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css',
        'http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css',
        'https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css'
    ]);
    ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?php
    $loguser = $this->request->getSession()->read('Auth.User');
    echo $this->Html->script([
        'https://code.jquery.com/jquery-1.12.4.js',
        'https://code.jquery.com/ui/1.12.1/jquery-ui.js',
        'https://ajax.googleapis.com/ajax/libs/angularjs/1.6.6/angular.js',
        'http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'
    ], ['block' => 'scriptLibraries']
    );
    ?>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-cyan bg-dark" style="border-radius: 0; margin-bottom: 0;">
        <a class="navbar-brand" href="#"><?= $this->fetch('title') ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Menu Avec Bootstrap-->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <?= $this->Html->link(__('Home'), ['controller' => 'Patients', 'action' => 'index'], ['class' => 'nav-link']) ?>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Menu
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">              
                        
                        <?php if ($loguser['type'] === 'admin'): ?>
                        <?= $this->Html->link(__('Patients'), ['controller' => 'Patients', 'action' => 'index', 'prefix' => false], ['class' => 'dropdown-item']) ?>
                        <?= $this->Html->link(__('Assignments'), ['controller' => 'Assignments', 'action' => 'index', 'prefix' => false], ['class' => 'dropdown-item']) ?>
                        <?= $this->Html->link(__('Files'), ['controller' => 'Files', 'action' => 'index', 'prefix' => false], ['class' => 'dropdown-item']) ?>
                        <?= $this->Html->link(__('Adresses'), ['controller' => 'Adresses', 'action' => 'index', 'prefix' => false], ['class' => 'dropdown-item']) ?>
                        <?= $this->Html->link(__('Medical centers'), ['controller' => 'MedicalCenters', 'action' => 'index', 'prefix' => false], ['class' => 'dropdown-item']) ?>
                        <?= $this->Html->link(__('Departments'), ['controller' => 'Departments', 'action' => 'index', 'prefix' => false], ['class' => 'dropdown-item']) ?>
                        <?= $this->Html->link(__('Chambers'), ['controller' => 'Chambers', 'action' => 'index', 'prefix' => false], ['class' => 'dropdown-item']) ?>
                        <?= $this->Html->link(__('Levels'), ['controller' => 'Levels', 'action' => 'index', 'prefix' => false], ['class' => 'dropdown-item']) ?>
                        <?= $this->Html->link(__('Users'), ['controller' => 'Users', 'action' => 'index', 'prefix' => false], ['class' => 'dropdown-item']);?>
                         
                        <?php elseif ($loguser['type'] === 'secretaireNC'): ?>
                        
                        <?= $this->Html->link(__('Patients'), ['controller' => 'Patients', 'action' => 'index'], ['class' => 'dropdown-item']) ?>
                        <?= $this->Html->link(__('Assignments'), ['controller' => 'Assignments', 'action' => 'index'], ['class' => 'dropdown-item']) ?>
                        <?= $this->Html->link(__('Adresses'), ['controller' => 'Adresses', 'action' => 'index'], ['class' => 'dropdown-item']) ?>
                        
                        <?php elseif ($loguser['type'] === 'secretaire'): ?>
                        
                        <?= $this->Html->link(__('Patients'), ['controller' => 'Patients', 'action' => 'index'], ['class' => 'dropdown-item']) ?>
                        <?= $this->Html->link(__('Assignments'), ['controller' => 'Assignments', 'action' => 'index'], ['class' => 'dropdown-item']) ?>
                        <?= $this->Html->link(__('Files'), ['controller' => 'Files', 'action' => 'index'], ['class' => 'dropdown-item']) ?>
                        <?= $this->Html->link(__('Adresses'), ['controller' => 'Adresses', 'action' => 'index'], ['class' => 'dropdown-item']) ?>
                        <?php endif;?>
                       
                        <div class="dropdown-divider"></div>
                        <?= $this->Html->link(__('Profile'), ['controller' => 'Users', 'action' => 'view', $loguser['id']], ['class' => 'dropdown-item']);?>
                        <?= $this->Html->link(__('About'), ['controller' => 'Apropos', 'action' => 'index'], ['class' => 'dropdown-item']) ?>
                    </div>
                </li>
            </ul>

            <!-- droite -->
            <ul class="navbar-nav ml-auto navbar-right">

                

                <li class="nav-item">
                    <?= $this->Html->link('Français', ['action' => 'changeLang', 'fr_CA'], ['class' => 'nav-link'], ['escape' => false]); ?>
                </li>

                <li class="nav-item">
                    <?= $this->Html->link('English', ['action' => 'changeLang', 'en_US'], ['class' => 'nav-link'], ['escape' => false]); ?>
                </li>

                <li class="nav-item">
                    <?= $this->Html->link('Espanol', ['action' => 'changeLang', 'es_MX'], ['class' => 'nav-link'], ['escape' => false]); ?>
                </li>
                
                
                
                <?php if ($loguser['type'] === 'admin'): ?>
                <span class="border-right"></span>
                <li class="nav-item">
                        <?= $this->Html->link(__(' Interface Admin '), ['controller' => 'Levels', 'action' => 'index', 'prefix' => 'admin'], ['class' => 'nav-link']);?>
                    </li>
                    <li class="nav-item">
                        <?= $this->Html->link(__(' Monopage interface '), ['controller' => 'Levels', 'action' => 'index', 'prefix' => false], ['class' => 'nav-link']);?>
                    </li>
                <?php endif;?>
                 <span class="border-right"></span>
                
                <?php if ($loguser): ?>
                    <li class="nav-item">
                        <?= $this->Html->link(($loguser['email']), ['controller' => 'Users', 'action' => 'view', $loguser['id']], ['class' => 'nav-link']);?>
                    </li>

                    <li class="nav-item">
                        <?= $this->Html->link(__(' Logout '), ['controller' => 'Users', 'action' => 'logout'], ['class' => 'nav-link']);?>
                    </li>
                    
                    

                <?php else: ?>
                <li class="nav-item">
                    <?= $this->Html->link(__(' Login '), ['controller' => 'Users', 'action' => 'logout'], ['class' => 'nav-link']);?>
                </li>

                <?php endif;?>

             
                
                
            </ul>
            
    </nav>
<?= $this->Flash->render() ?>
<div class="container clearfix">
    <?= $this->fetch('content') ?>
</div>
<footer>
</footer>
<?= $this->fetch('scriptLibraries') ?>
<?= $this->fetch('script'); ?>
<?= $this->fetch('scriptBottom') ?>
</body>
</html>
